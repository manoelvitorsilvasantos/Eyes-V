<?php 

	include('config.php');
	session_start();

	// Verifica se a sessão está vazia (usuário não autenticado)
	if(empty($_SESSION)){
	    header("location: index.php");
	    exit; // Encerra a execução do script para evitar processamento adicional.
	}


	// Verifica se o formulário foi submetido e se todos os campos estão preenchidos
	if(
	    empty($_POST) || 
	    empty($_POST["codigo"])||
	    empty($_POST["nome"]) || 
	    empty($_POST["cel"]) || 
	    empty($_POST["email"])
	){
	    header("location: new_student.php");
	    exit; // Encerra a execução do script para evitar processamento adicional.
	}

	// Recupera os dados do formulário
	$codigo = $_POST["codigo"];
	$nome = $_POST["nome"];
	$celular = $_POST["cel"];
	$email = $_POST["email"];

	$sql = "INSERT INTO aluno(id, nome, phone, email) 
			VALUES(?, ?, ?, ?)";

	if($stmt = $conn->prepare($sql)){
		$stmt->bind_param("isss", $codigo, $nome, $celular, $email);
		if($stmt->execute()){
			echo "Registro inserido com sucesso!";
			sleep(2);
			header("location: dashboard.php");
		}
		else{
			echo "Erro ao inserir registro: ". $stmt->error;
			sleep(3);
			header("location: new_student.php");
		}

		$stmt->close();
	}
	else{
		echo "Erro na preparação da consulta: ". $conn->error;
	}

	$conn->close();