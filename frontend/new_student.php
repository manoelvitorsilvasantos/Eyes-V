<?php 
session_start();

// Verifica se a sessão está vazia (usuário não autenticado)
if(empty($_SESSION)){
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
        <form action="registrar_student.php" method="POST" class="formlogin">
            <h3>Cadastro - Eyes-V</h3>
            <br>
            <label for="codigo">Código</label>
            <input
                placeholder="Digite o código" 
                type="number" 
                id="codigo" 
                name="codigo" 
                min="1"
                oninput="toUpper(this)" 
                max="99999999999" 
                maxlength="11">

            <label for="nome">Nome</label>
            <input 
                type="text" 
                id="nome" 
                name="nome"
                placeholder="Digite o nome" 
                >

            <label for="phone">Celular</label>
            <input 
                type="tel" 
                id="cel" 
                name="cel"
                maxlength="15" 
                placeholder="(XX) XXXXX-XXXX" 
                oninput="mascaraTelefone(this)"
            >
            
            <label for="email">E-mail</label>
            <input 
                type="email" 
                id="email" 
                name="email"
                placeholder="Digite o E-mail" 
            >
            <br>
            <div class="btn">
                <button type="submit" name="login" id="login">Cadastrar</button>
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
