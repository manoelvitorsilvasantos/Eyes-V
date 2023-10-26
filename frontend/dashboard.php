<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eyes-V | Reconhecimento Facial</title>
  <link rel="stylesheet" type="text/css" href="style_dashboard.css">
  <link href="./assets/img/logo.jpg" rel="shortcut icon" type="image/jpeg">
</head>
<body>
  <div class="gradient-background">
    <div class="centered-container">
      <header id="header">
        <a id="logo" href=""><img src="./assets/img/logo.jpg" width="52"/></a>
        <nav id="nav">
          <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
            <span id="hamburger"></span>
          </button>
          <ul id="menu" role="menu">
            <li>
              <a title="Inicio" href="dashboard.php">
                Home
              </a>
            </li>
            <li>
              <a title="Cadastrar Aluno" href="registrar.aluno.php">
                Cadastrar Aluno
              </a>
            </li>
            <li>
              <a title="Lista Aluno" href="lista.aluno.php">
                Lista Aluno
              </a>
            </li>
            <li>
              <a title="Add Imagem" href="salvar.imagem.php">
                Add Imagem
              </a>
            </li>
            <?php
              if ($_SESSION['tipo'] == 1) {
                echo "<li><a href='registrar.usuario.php'>Add Usuário</a></li>";
              }
            ?>
            <li>
              <a title="Sair" href="logout.php">
                Sair
              </a>
            </li>
          </ul>
        </nav>
      </header>
    </div>
  </div>
  <script src="./assets/js/menu.js"></script>
</body>
</html>
