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
			<li><a href="home.html">Home</a></li>
			<li><a href="cad_alunos.html">Cadastrar Aluno</a></li>
			<li><a href="reg_imagem.html">Adicionar Imagem</a></li>
			<li><a href="cad_usuario.html">Adicionar Usuário</a></li>
			<li><a href="sair.html">Sair</a></li>
		</ul>
    </div>

    <div class="form-container">
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="formlogin">
            <h3>Cadastar Imagem</h3>
            <br>
            <label for="email">E-mail do Aluno</label>
            <input type="email" id="email" name="email" placeholder="Digite o E-mail do Aluno" required>
            <label for="photo">Imagem 1</label>
            <input type="file" id="imagens" name="imagens[]" multiple>
            <br>
            <div class="form-group">
                <button type="submit" name="login" id="login">Cadastrar</button>
            </div>
        </form>
    </div>

</body>

</html>