<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eyes-V | Reconhecimento Facial</title>
  <link rel="stylesheet" href="./assets/css/style_lista.css">
  <link href="./assets/img/logo.jpg" rel="shortcut icon" type="image/jpeg">
  <style>
    #web-radio{
      color:black;
    }
  </style>
</head>

<body>
  <div class="centered-container">
    <div class="content">
      <?php
        $sql = "SELECT a.id, a.nome, a.phone, a.email, COUNT(i.id_aluno) AS quantidade_imagens FROM aluno a LEFT JOIN imagem i ON a.id = i.id_aluno GROUP BY a.id, a.nome, a.phone, a.email";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
      ?>
      <table class="rTable">
        <?php
          echo "<thead><tr><td>Id</td><th>nome</th><th>celular</th><th>E-mail</th><th>Imagens</th></thead>";
          echo "<tbody>";
          while($row=$resultado->fetch_assoc()){
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["quantidade_imagens"] . "</td></tr>";
          }
          echo "</tbody></table>";  
        }
        else{
          echo "<h3>0 resultados</h3>";
        } 
        $conn->close();
      ?>
    </div>
  </div>
  <footer id="footer">Copyright All reserverd by Eyes-V &reg;</footer>
  <script src="./assets/js/menu.js"></script>
</body>
</html>
