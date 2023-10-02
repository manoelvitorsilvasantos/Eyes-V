<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulário de Login</title>
	<link rel="stylesheet" href="./assets/css/style.css">
</head>

<?php
error_reporting(E_ERROR | E_PARSE);
$msg = $_GET['msg'];
if (!empty($msg)) {

} else {
	$msg = null;
}
?>

<body>
	<div class="form">
		<h3><?php echo $msg; ?></h3>
		<div class="formlogin">
			<h2>Eyes-V</h2>
			<form action="login.php" method="POST">
				<label for="usuario">Usuário:</label>
				<input type="text" id="usuario" name="usuario" required placeholder="Digite seu nome de usuário">
				<br><br>

				<label for="senha">Senha:</label>
				<input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
				<br><br>

				<div class="form-group">
					<button type="submit" name="login" id="login">Logar</button>
				</div>
			</form>
		</div>

	</div>
</body>

</html>