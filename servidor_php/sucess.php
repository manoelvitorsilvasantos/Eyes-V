<?php
session_start();

// Verifica se a sessão está vazia (usuário não autenticado)
if (empty($_SESSION)) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}

$title = null;
$msg = null;

if (!empty($_GET['title']) && (!empty($_GET['msg']))) {
	$title = $_GET['title'];
	$msg = $_GET['msg'];
} else {
	header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style type="text/css">
        .description{
            display:flex;
            flex-direction:row;
            padding:10px;
            align-content:center;
            align-items:center;
            justify-content:center;
        }

        .description > h1, h2, h3, h4, h5, h6{
            margin-top:100px;
            text-align:center;
        }

        .description > p{
            margin-top:100px;
            text-align:justify-all;
        }

        .description > ul{
            text-align:center;
        }

        .destaque{
            font-weight:bolder;
        }
    </style>
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

    <br>
    <br>
    <div class="description">
        <br><br>
        <h5><?php echo $msg; ?></h5>
    </div>

</body>

</html>