<?php
	include('config.php');
	if(isset($_GET['celular']) && isset($_GET['id'])){
		$celular = $_GET['celular'];
		$id = $_GET['id'];
		if(!empty($nome) && !empty($celular)){
			$dataAtual = date("Y-m-d H:i:s");
			$sql= "INSERT INTO logs(frequencia, dt, id_aluno) VALUES(?,?,?)";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("isi", $frequencia, $dtAtual, $id_aluno);
			if($stmt->execute()){
				http_response_code(200);
			}
			else{
				http_response_code(400);
			}
			$conn->close();
		}
	else{
		http_response_code(400);
	}	
?>