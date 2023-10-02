<?php
session_start();

// Verifica se o formulário foi enviado e se os campos de usuário e senha estão preenchidos
if (empty($_POST) || empty($_POST["usuario"]) || empty($_POST["senha"])) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}

include 'config.php';

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

// Hash da senha usando MD5
$senha_md5 = md5($senha);

// Consulta SQL
$sql = "SELECT * FROM usuarios_credencial
	        WHERE usuario = '{$usuario}'
	        AND senha = '{$senha_md5}'";

$res = $conn->query($sql) or die($conn->error);

$row = $res->fetch_object();

$qtd = $res->num_rows;

if ($qtd > 0) {
	// Autenticação bem-sucedida, armazena os dados na sessão
	$_SESSION["usuario"] = $usuario;
	$_SESSION["nome"] = $row->nome;
	$_SESSION["tipo"] = $row->tipo;
	header("location: dashboard.php");
} else {
	$msg = "Usuário não cadastrado.";
	// Autenticação falhou, redireciona de volta para a página inicial
	header("location: index.php?msg=$msg");
}
