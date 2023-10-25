<?php
	
	class Verificador{

		public function idExist($id, $conn){
			try{
				$sql = "SELECT * FROM aluno WHERE id =  ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$resultado = $stmt->get_result();
				if($resultado->num_rows > 0){
					return false;
				}
				else if($resultado->num_rows == 0){
					return true; //não tiver registro
				}
				else{
					return false;
				}
			}
			catch(Exception $e){
				return false;
			}
		}

		public function emailExist($email, $conn){
			try{
				$sql = "SELECT * FROM aluno WHERE email LIKE  ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$resultado = $stmt->get_result();
				if($resultado->num_rows > 0){
					return false;
				}
				else if($resultado->num_rows == 0){
					return true; //não tiver registro
				}
				else{
					return false;
				}
			}
			catch(Exception $e){
				return false;
			}
		}

		public function phoneExist($phone, $conn){
			try{
				$sql = "SELECT * FROM aluno WHERE phone LIKE  ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s", $phone);
				$stmt->execute();
				$resultado = $stmt->get_result();
				if($resultado->num_rows > 0){
					return false;
				}
				else if($resultado->num_rows == 0){
					return true; //não tiver registro
				}
				else{
					return false;
				}
			}
			catch(Exception $e){
				return false;
			}
		}

		public function findByEmail($email, $conn){
			$sql = "SELECT id FROM aluno WHERE email = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $email);
			if($stmt->execute()){
				$resultado=$stmt->get_result();
				if($resultado->num_rows > 0){
					$row = $resultado->fetch_assoc();
					return $row["id"];
				}
				else{
					return null;
				}
			}
			else{
				return false;
			}
			$stmt->close();
		}


	}