<?php
	function getCodigo($email){
		$codigo=0;
		$sql = "SELECT * FROM aluno WHERE email = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$resultado=$stmt->get_result();
			if($resultado->num_rows > 0){
				while($row=$resultado->fetch_assoc()){
					$codigo = $row["id"];
				}
			}else{
				header("location: salvar.imagem");
				exit;
			}
		}
		else{
			echo "Erro ao executar a consulta: " . $conn->error;
		}

		$stmt->close();
		$conn->close();
		return $codigo;
	}