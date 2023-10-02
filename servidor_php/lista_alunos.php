<?php
session_start();
include "config.php";
// Verifica se a sessão está vazia (usuário não autenticado)
if (empty($_SESSION)) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastar Aluno</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>

<body>
    <div class="box">
        <ul class="menu">
			<li><a href="dashboard.php">Home</a></li>
            <li><a href="cad_alunos.php">Cadastrar Aluno</a></li>
            <li><a href="lista_alunos.php">Lista Alunos</a></li>
            <li><a href="reg_imagem.php">Adicionar Imagem</a></li>
            <?php
if ($_SESSION['tipo'] == 1) {
	echo "<li><a href='cad_usuario.php'>Adicionar Usuário</a></li>";
}
?>
            <li><a href="logout.php">Sair</a></li>
		</ul>
    </div>

    <div class="form-container">
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
    <script src="./assets/js/script.js"></script>
</body>
</html>