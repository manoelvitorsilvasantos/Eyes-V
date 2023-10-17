<?php
session_start();

// Verifica se a sessão está vazia (usuário não autenticado)
if (empty($_SESSION)) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}

$title = null;
$message = null;

if (!empty($_GET['title']) && (!empty($_GET['message']))) {
	$title = $_GET['title'];
	$message = $_GET['message'];
} else {
	header("location: dashboard.php");
	exit;
}

$title = $_GET['title'];
$message = $_GET['message'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <div class="link">
        <a href="dashboard.php">Voltar ao Menu.</a>
    </div>
    <div class="form">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
