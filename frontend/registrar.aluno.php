<?php

include('permission.php');
include('config.php');
include('util.php');

function findIdStudent($id) {

	global $conn; // Precisamos acessar a conexão global dentro da função.

	// Consulta SQL para buscar o ID com base no email.
	$sql = "SELECT id FROM aluno WHERE id = ?"; // Substitua "usuarios" pelo nome da sua tabela.

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id); // "s" indica que o email é uma string.
	$stmt->execute();

	$resultado = $stmt->get_result();

	if ($resultado->num_rows > 0) {
		return true;
	} else {
		return false;
	}
}

// Verifica se o formulário foi submetido e se todos os campos estão preenchidos
if (
	empty($_POST) ||
	empty($_POST["codigo"]) ||
	empty($_POST["nome"]) ||
	empty($_POST["cel"]) ||
	empty($_POST["email"])
) {
	header("location:aluno.form.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}

$telefone = $_POST['cel'];
$formatter = PhoneNumberFormatter::getInstance();

// Recupera os dados do formulário
$codigo = $_POST["codigo"];
$nome = $_POST["nome"];
$celular = $formatter->formatPhoneNumber($telefone);
$email = $_POST["email"];

$sql = "INSERT INTO aluno(id, nome, phone, email)
			VALUES(?, ?, ?, ?)";

if (!findIdStudent($codigo)) {
	if ($stmt = $conn->prepare($sql)) {
		$stmt->bind_param("isss", $codigo, $nome, $celular, $email);
		if ($stmt->execute()) {
			//echo "Registro inserido com sucesso!";
			$title = "Sucesso";
			$msg = "Aluno cadastrado com sucesso.";
			header("location: sucess.php?title=$title&msg=$msg");
		} else {
			echo "Erro ao inserir registro: " . $stmt->error;
			$title = "Error";
			$msg = "Error " . $stmt->error . ",Aluno não cadastrado.";
			$link = "aluno.form.php";
			$link_title = "Aqui";
			header("location: status.php?title=$title&msg=$msg&link=$link&link_title=$link_title");
		}
		$stmt->close();
	} else {
		echo "Erro na preparação da consulta: " . $conn->error;
	}
} else {
	$title = "Error";
	$msg = "Aluno já cadastrado no sistema.";
	$link = "aluno.form.php";
	$link_title = "Aqui";
	header("location: status.php?title=$title&msg=$msg&link=$link?link_title=$link_title");
}
$conn->close();
?>