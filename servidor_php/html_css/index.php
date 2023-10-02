<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulário de Login</title>
	<link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
	<div class="form">
		<div class="formlogin">
			<h2>Eyes</h2>
			<form action="login.php" method="POST">
				<label for="usuario">Usuário:</label>
				<input type="text" id="usuario" name="usuario" required placeholder="Digite seu nome de usuário">
				<br><br>

				<label for="senha">Senha:</label>
				<input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
				<br><br>

				<div class="form-group">
					<button type="submit" name="login" id="login">Cadastrar</button>
				</div>
			</form>
		</div>

	</div>
</body>

</html>