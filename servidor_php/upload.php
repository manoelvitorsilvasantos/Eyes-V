<?php
	session_start();
	// Verifica se a sessão está vazia (usuário não autenticado)
	if(empty($_SESSION)){
	    header("location: index.php");
	    exit; // Encerra a execução do script para evitar processamento adicional.
	}


	include('config.php');


	function buscarIdPorEmail($email) {
	    global $conn; // Precisamos acessar a conexão global dentro da função.

	    // Consulta SQL para buscar o ID com base no email.
	    $sql = "SELECT id FROM aluno WHERE email = ?"; // Substitua "usuarios" pelo nome da sua tabela.

	    $stmt = $conn->prepare($sql);
	    $stmt->bind_param("s", $email); // "s" indica que o email é uma string.

	    if ($stmt->execute()) {
	        $result = $stmt->get_result();

	        if ($result->num_rows > 0) {
	            // O registro com o email especificado foi encontrado na tabela.
	            $row = $result->fetch_assoc();
	            return $row["id"]; // Retorna o ID do registro encontrado.
	        } else {
	            // Nenhum registro com o email especificado foi encontrado.
	            return null; // Ou qualquer valor que você desejar para indicar que o email não foi encontrado.
	        }
	    } else {
	        // Ocorreu um erro ao executar a consulta.
	        return false;
	    }

	    $stmt->close();
	}

	$email = $_POST["email"];
	$idEncontrado = buscarIdPorEmail($email);
	$codigo = $idEncontrado;

	if($idEncontrado === null){
		header("location: salvar.imagem.php");
	}
	$conn->close();


	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagens"])){
		include('config.php');
		$allowed_extensions = array("jpg", "jpeg", "png", "gif");

		foreach($_FILES["imagens"]["tmp_name"] as $key => $tmp_name){
			$file_name = $_FILES["imagens"]["name"][$key];
			$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

			if(in_array($file_extension, $allowed_extensions)){
				$file_data = file_get_contents($_FILES["imagens"]["tmp_name"][$key]);
				$sql = "INSERT INTO imagem (imagem_aluno, id_aluno) VALUES(?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ss", $file_data, $codigo);

				if($stmt->execute()){
					echo "<h3>Imagem salva com sucesso.</h3>";
					header("location: dashboard.php");
					exit;
				}
				else{
					echo "<h3>Erro ao salvar a imagem $file_name no banco de dados.</h3>" . $conn->error . "<br>";
					echo "<a href='dashboard.php'>Voltar ao Menu</a>";
				}
			}
			else{
				echo "Tipo de arquivo não permitido: $file_name.<br>";
				echo "<a href='dashboard.php'>Voltar ao Menu</a>";
			}
		}
		$conn->close();
	}