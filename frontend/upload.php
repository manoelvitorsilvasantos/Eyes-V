<?php
	include('config.php');
	include('permission.php');
	include_once('verificador.php');

	$email = $_POST["email"];
	$verificador = new Verificador();
	$idEncontrado = $verificador->findByEmail($email, $conn);
	$codigo = $idEncontrado;

	if ($idEncontrado === null) {
		$title = "Error";
		$message = "Aluno não registrado, cadastre primeiramente o aluno.";
		header("location: sucess.php?title=$title&msg=$message");
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