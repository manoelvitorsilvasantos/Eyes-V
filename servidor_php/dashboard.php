<?php
session_start();

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
    <title>Menu</title>
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

        .description > h1{
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
        <h3>Seja bem vindo a
            <br>
            <span>EYES-V</span></h3>
    </div>
</body>
</html>
