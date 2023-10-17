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
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <div class="link">
        <a href="<?php echo $link; ?>">Voltar</a>
    </div>
    <div class="form">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $msg; ?></p>
    </div>
</body>
</html>
