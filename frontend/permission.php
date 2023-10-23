<?php
	session_start();

	// Verifica se a sessão está vazia (usuário não autenticado)
	if (empty($_SESSION)) {
		header("location: index.php");
		exit; // Encerra a execução do script para evitar processamento adicional.
	}
?>