<?php

class administrador {

	public function logar($usuario, $senha) {

		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM administradores WHERE usuario = :usuario");
		$sql->bindValue(":usuario", $usuario);
		$sql->execute();

	
		if($sql->rowCount() > 0) {

			$db = $pdo->prepare("SELECT * FROM administradores WHERE usuario = :usuario AND senha = :senha");
			$db->bindValue(":usuario", $usuario);
			$db->bindValue(":senha", md5($senha));
			$db->execute();

			if($db->rowCount() > 0) {

				$dados = $db->fetch();
				$_SESSION["idUser"] = $dados["id"];

				return true;

			} else {

				return false;
			}
				   
		} else  {
		
			echo '<div class="alert"><p>Usuario não existe!</p></div>';        
			die();
		}


	}
}


?>