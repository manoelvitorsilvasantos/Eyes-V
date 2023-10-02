<?php
session_start();

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
    <title>Cadastrar Imagem</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="box">
        <ul class="menu">
			<li><a href="dashboard.php">Home</a></li>
            <li><a href="cad_alunos.php">Cadastrar Aluno</a></li>
            <li><a href="reg_imagem.php">Adicionar Imagem</a></li>
            <li><a href="cad_usuario.php">Adicionar Usuário</a></li>
            <li><a href="logout.php">Sair</a></li>
		</ul>
    </div>

    <div class="form-container">
        <form method="POST" action="upload.php" enctype="multipart/form-data" class="formlogin">
            <h3>Cadastar Imagem</h3>
            <br>
            <label for="email">E-mail do Aluno</label>
            <input type="email" id="email" name="email" placeholder="Digite o E-mail do Aluno" required>
            <label for="imagens">Imagems</label>
            <input type="file" id="imagens" name="imagens[]" multiple>
            <br>
            <div class="form-group">
                <button type="submit" name="login" id="login">Cadastrar</button>
            </div>
        </form>
    </div>

</body>

</html>