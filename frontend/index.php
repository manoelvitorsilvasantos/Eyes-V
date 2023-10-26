<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style_novo.css">
  <link href="./assets/img/logo.jpg" rel="shortcut icon" type="image/jpeg">
</head>
<body>
  <div class="outer">
    <div class="form-container">
      <?php
        session_start();
        if (!empty($_SESSION)) {
          header("location: dashboard.php");
          exit; // Encerra a execução do script para evitar processamento adicional.
        }
      ?>
      <div class="text">
        <h1>Sobre o Eyes</h1>
        <hr>
        <p>Eyes-V: Inovação com Reconhecimento Facial
O Instituto Federal da Bahia (IFBA) está avançando para um nível inédito de segurança e controle com o projeto "Eyes-V". Este inovador sistema de reconhecimento facial foi concebido para oferecer tranquilidade aos pais e responsáveis, permitindo que estejam sempre informados sobre a entrada e saída de seus filhos nas instalações do instituto.

Com a capacidade de identificar os alunos de forma rápida e precisa, o "Eyes-V" elimina a necessidade de registros manuais, garantindo maior eficiência e transparência. Através da tecnologia de reconhecimento facial, o IFBA está promovendo uma experiência mais segura e conveniente para toda a comunidade escolar, reforçando seu compromisso com a excelência em educação e inovação em segurança. Este projeto representa um passo significativo em direção a um ambiente escolar mais seguro e conectado.
</p>
      </div>
      <div class="form">
        <form action="login.php" method="POST" class="formlogin">
          <br>
          <h3>Login</h3>
          <br>
          <label>Usuário</label>
          <input 
            type="text" 
            id="usuario" 
            name="usuario"
            placeholder="Digite o nome de usuário" 
            required>
          <label>Senha</label>
          <input 
            type="password" 
            id="senha" 
            name="senha"
            placeholder="Digite a sua senha"
            required>
          <br>
          <div class="btn">
            <button type="submit" name="login" id="login">LOGAR</button>
          </div>
          <br>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
