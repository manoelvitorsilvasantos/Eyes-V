<?php
	session_start();
	if (!empty($_SESSION)) {
		header("location: dashboard.php");
		exit; // Encerra a execução do script para evitar processamento adicional.
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
			<div class="form-img">
				<img src="./assets/img/logo.jpg" width="82">
			</div>
			<br>
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
			<bR>
		</form>
	</div>
</body>
</html>