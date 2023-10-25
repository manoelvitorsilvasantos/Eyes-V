<?php
    include('permission.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manoel Vitor | Fullstack Developed</title>
  <link rel="stylesheet" href="./assets/css/dashboard.css">
  <link href="./assets/img/logo.jpg" rel="shortcut icon" type="image/jpeg">
  <style>
    #web-radio{
      color:black;
    }
  </style>
</head>

<body>
  <header id="header">
   <a id="logo" href=""><img src="./assets/img/logo.jpg" width="52"/></a></a>
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
  <script src="./assets/js/menu.js"></script>
  <main id="main">
    <!--<h3 id="title-main">Olá, Seja bem vindo ao meu site</h3>-->
    <!--<p id="text-main"></p>-->
    <h1 class="title-main">Eyes-V: Inovação com Reconhecimento Facial.</h1>
    <p class="paragraph-main">O Instituto Federal da Bahia (IFBA) está avançando para um nível inédito de segurança e controle com o projeto "Eyes-V". Este inovador sistema de reconhecimento facial foi concebido para oferecer tranquilidade aos pais e responsáveis, permitindo que estejam sempre informados sobre a entrada e saída de seus filhos nas instalações do instituto.</p>
    <p class="paragraph-main">Com a capacidade de identificar os alunos de forma rápida e precisa, o "Eyes-V" elimina a necessidade de registros manuais, garantindo maior eficiência e transparência. Através da tecnologia de reconhecimento facial, o IFBA está promovendo uma experiência mais segura e conveniente para toda a comunidade escolar, reforçando seu compromisso com a excelência em educação e inovação em segurança. Este projeto representa um passo significativo em direção a um ambiente escolar mais seguro e conectado.</p>
  </main>
  <footer id="footer">Todos Direitos Reservados para Eyes-V &reg;</footer>
</body>

</html>