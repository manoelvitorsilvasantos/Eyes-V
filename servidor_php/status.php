<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
// Verifica se a sessão está vazia (usuário não autenticado)
if (empty($_SESSION)) {
	header("location: index.php");
	exit; // Encerra a execução do script para evitar processamento adicional.
}

$title = null;
$msg = null;
$link = null;
$link_title = null;

if (!empty($_GET['title']) && (!empty($_GET['msg']))
	&& (!empty($_GET['link'])) && (empty($_GET['link_title']))) {
	$title = $_GET['title'];
	$msg = $_GET['msg'];
	$link = $_GET['link'];
	$link_title = $_GET['link_title'];
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
            <li><a href="reg_imagem.php">Adicionar Imagem</a></li>
            <li><a href="cad_usuario.php">Adicionar Usuário</a></li>
            <li><a href="logout.php">Sair</a></li>
		</ul>
    </div>

    <br>
    <br>
    <div class="description">
        <br><br>
        <h5><?php echo $msg; ?></h5>
        <h5>Tentar novamente <a href="<?php echo $link; ?>">
            Clique Aqui
        </a></h5>
    </div>

</body>

</html>