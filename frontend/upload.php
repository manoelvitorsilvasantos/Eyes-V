<?php
session_start();
include 'config.php';
// Verifica se a sessão está vazia (usuário não autenticado)
if (empty($_SESSION)) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}

function buscarIdPorEmail($email) {
	global $conn; // Precisamos acessar a conexão global dentro da função.
	// Consulta SQL para buscar o ID com base no email.
	$sql = "SELECT id FROM aluno WHERE email = ?"; // Substitua "usuarios" pelo nome da sua tabela.

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $email); // "s" indica que o email é uma string.

	if ($stmt->execute()) {
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			// O registro com o email especificado foi encontrado na tabela.
			$row = $result->fetch_assoc();
			return $row["id"]; // Retorna o ID do registro encontrado.
		} else {
			// Nenhum registro com o email especificado foi encontrado.
			return null; // Ou qualquer valor que você desejar para indicar que o email não foi encontrado.
		}
	} else {
		// Ocorreu um erro ao executar a consulta.
		return false;
	}
	$stmt->close();
}

$email = $_POST["email"];
$idEncontrado = buscarIdPorEmail($email);
$codigo = $idEncontrado;

if ($idEncontrado === null) {
	$title = "Error";
	$message = "Aluno não registrado, cadastre primeiramente o aluno.";
	header("location: sucess.php?title=$title&message=$message");
	exit;
}

// Verifique se a requisição é POST e se existem arquivos enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagens"])) {
	// Array de extensões permitidas
	$allowed_extensions = array("jpg", "jpeg", "png", "gif");

	// Inicie uma transação
	$conn->begin_transaction();

	// Variável para controlar erros
	$erro = false;

	// Loop através das imagens enviadas
	foreach ($_FILES["imagens"]["tmp_name"] as $key => $tmp_name) {
		$file_name = $_FILES["imagens"]["name"][$key];
		$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

		// Verifique a extensão do arquivo
		if (in_array($file_extension, $allowed_extensions)) {
			$file_data = file_get_contents($_FILES["imagens"]["tmp_name"][$key]);

			// Prepare a consulta SQL
			$sql = "INSERT INTO imagem (imagem_aluno, id_aluno) VALUES(?, ?)";
			$stmt = $conn->prepare($sql);

			// Verifique se a preparação da consulta foi bem-sucedida
			if (!$stmt) {
				die("Erro na preparação da consulta: " . $conn->error);
			}

			// Vincule os parâmetros da consulta
			$stmt->bind_param("si", $file_data, $codigo);

			// Execute a consulta
			if (!$stmt->execute()) {
				$erro = true;
				break; // Se houver um erro, saia do loop
			}
		} else {
			echo "Tipo de arquivo não permitido: $file_name.<br>";
		}
	}

	// Verifique se houve algum erro
	if ($erro) {
		$conn->rollback();
		$title = "Error";
		$message = "Aluno não registrado, cadastre primeiramente o aluno.";
		header("location: sucess.php?title=$title&message=$message");
		exit;
	} else {
		$conn->commit();
		$title = "Sucesso";
		$message = "Suas imagens foram salvas com sucesso.";
		header("location: sucess.php?title=$title&message=$message");
		exit;
	}

	// Feche a consulta e a conexão com o banco de dados
	$stmt->close();
	$conn->close();
}