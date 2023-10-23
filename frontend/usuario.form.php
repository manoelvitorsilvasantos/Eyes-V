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
        <form action="registrar.php" method="POST" class="formlogin">
            <h3>Cadastro - Eyes-V</h3>
            <br>
            <label for="nome">Nome</label>
            <input 
                type="text" 
                id="nome" 
                name="nome"
                placeholder="Digite o nome"
                required>
            
            <label for="usuario">Usuário</label>
            <input 
                type="text" 
                id="usuario" 
                name="usuario"
                placeholder="Digite o usuário"
                required>
            
            <label for="email">E-mail</label>
            <input 
                type="email" 
                id="email" 
                name="email"
                placeholder="Digite o E-mail"
                required>
            
            <label for="senha">Senha</label>
            <input 
                type="password" 
                id="senha" 
                name="senha"
                placeholder="Digite a senha"
                required>
            
            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo">
                <option value="1">Administrador</option>
                <option value="2">Monitor</option>
                <option value="3">Funcionário</option>
            </select>
            <br>
            <div class="btn">
                <button type="submit" name="login" id="login">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>
