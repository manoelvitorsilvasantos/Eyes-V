<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Usuário</title>
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
        <form action="registrar.php" method="POST" class="formlogin">
            <h3>Cadastrar Usuário</h3>
            <br>
            <div class="form-group"> <!-- Adicione a classe form-group aqui -->
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome">
            </div>

            <div class="form-group"> <!-- Adicione a classe form-group aqui -->
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" placeholder="Digite o usuário">
            </div>

            <div class="form-group"> <!-- Adicione a classe form-group aqui -->
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite o E-mail">
            </div>

            <div class="form-group"> <!-- Adicione a classe form-group aqui -->
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite a senha">
            </div>

            <div class="form-group"> <!-- Adicione a classe form-group aqui -->
                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo">
                    <option value="1">Administrador</option>
                    <option value="2">Monitor</option>
                    <option value="3">Funcionário</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" name="login" id="login">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>