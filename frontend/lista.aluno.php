<?php
session_start();
include 'config.php';
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
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="registrar.aluno.php">Cadastra Aluno</a></li>
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
    <div>
        <?php
$sql = "SELECT a.id, a.nome, a.phone, a.email, COUNT(i.id_aluno) AS quantidade_imagens FROM aluno a LEFT JOIN imagem i ON a.id = i.id_aluno GROUP BY a.id, a.nome, a.phone, a.email";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
	echo "<table><tr><th>ID</th><th>nome</th><th>Celular</th><th>E-mail</th><th>Qtd Imagens</th>";
	while ($row = $resultado->fetch_assoc()) {
		echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["quantidade_imagens"] . "</td></tr>";
	}
	echo "</table>";
} else {
	echo "<h3>0 resultados</h3>";
}
$conn->close();
?>
    </div>
</body>
</html>
