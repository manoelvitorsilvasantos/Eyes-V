<?php
session_start();
include "config.php";

// Verifica se a sessão está vazia (usuário não autenticado)
if (empty($_SESSION)) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro - Eyes-V</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <div class="link">
        <a href="dashboard.php">Voltar ao Menu.</a>
    </div>
    <div class="form">
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="formlogin">
            <h3>Cadastro - Eyes-V</h3>
            <br>
            <label for="email">E-mail do Aluno</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite o E-mail do Aluno"
                required
            >
            <label for="imagens">Imagem 1</label>
            <input
                type="file"
                id="imagens"
                name="imagens[]"
                multiple
                required
            >
            <br>
            <div class="btn">
                <button type="submit" name="login" id="login">Salvar</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="./assets/js/mascara.js">
        var nome = document.getElementById("nome");
        nome.addEventListener("input", function(){
            this.value = this.value.toUpperCase();
        });
    </script>
</body>
</html>
