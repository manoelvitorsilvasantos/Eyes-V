<?php
session_start();
if (empty($_SESSION)) {
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <title>Eyes-V</title>
</head>
<body>
    <nav class="menu">
        <div class="logo">Logado:<?php echo $_SESSION['usuario']; ?></div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="registrar.aluno.php">Cadastra Aluno</a></li>
            <li><a href="lista.aluno.php">Lista Aluno</a></li>
            <li><a href="salvar.imagem.php">Add Imagem</a></li>
            <?php
if ($_SESSION['tipo'] == 1) {
	echo "<li><a href='registrar.usuario.php'>Add Usuário</a></li>";
}
?>
            <li><a href="logout.php">Sair</a></li>
        </ul>
        <div class="menu-icon">☰</div>
    </nav>
    <!-- Conteúdo do site aqui -->
    <script type="text/javascript" src="./assets/js/script.js"></script>
</body>
</html>
