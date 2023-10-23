<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<style type="text/css" media="screen">
		input[type=text]{
			text-align:left;
		}	
		input[type=password]{
			text-align:left;
		}
	</style>
</head>
<body>
	<div class="form">
		<form action="login.php" method="POST" class="formlogin">
			<h3>Login - Eyes-V</h3>
			<br>
			<label>Usuário</label>
			<input 
				type="text" 
				id="usuario" 
				name="usuario"
				placeholder="Digite o nome de usuário" 
				required>
			<label>Senha</label>
			<input 
				type="password" 
				id="senha" 
				name="senha"
				placeholder="Digite a sua senha"
				required>
			<br>
			<div class="btn">
				<button type="submit" name="login" id="login">LOGAR</button>
			</div>
		</form>
	</div>
</body>
</html>