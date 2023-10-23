<?php
    include('permission.php');
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
        <form  method="POST" class="formlogin">
            <h3>Registrar Novo Aluno</h3>
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
                maxlength="11"
                required>

            <label for="nome">Nome</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome"
                required>

            <label for="phone">Celular</label>
            <input
                type="tel"
                id="cel"
                name="cel"
                maxlength="15"
                placeholder="(XX) XXXXX-XXXX"
                oninput="mascaraTelefone(this)"
                required
            >

            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite o E-mail"
                required
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
    <script rel="javascript" type="text/javascript" src="./assets/js/aluno.js"></script>
</body>
</html>
