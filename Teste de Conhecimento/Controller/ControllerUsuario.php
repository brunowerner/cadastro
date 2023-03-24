<?php

require_once ('../Connection/Connection.php');


class ControllerUsuario{

	public function Select(){

		$sql = "SELECT * FROM usuario";
		$stmt = getConnection()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		return $registros;

	}

	public function SelectById($id){

		$sql = "SELECT * FROM usuario WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$registro = $stmt->fetch();
		
		return $registro;

	}

	public function Authentication($usuario){

		$sql = "SELECT * FROM usuario WHERE usuario = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $usuario);
		$stmt->execute();
		$registro = $stmt->fetchAll();
		
		return $registro;
	}


	public function Update($id, $usuario, $senha, $status){

		$sql = "UPDATE usuario SET usuario = ?, senha = ?, status = ? WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $usuario);
		$stmt->bindValue(2, $senha);
		$stmt->bindValue(3, $status);
		$stmt->bindValue(4, $id);
		$sucesso = $stmt->execute();

		return $sucesso;


	}

	public function Create($usuario, $senha, $status){

		$sql = "INSERT INTO usuario (usuario,senha,status) VALUES (?,?,?)";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $usuario);
		$stmt->bindValue(2, $senha);
		$stmt->bindValue(3, $status);
		$sucesso = $stmt->execute();

		return $sucesso;


	}

	public function Delete($id){

		$sql = "DELETE FROM usuario WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$sucesso = $stmt->execute();

		return $sucesso;
	}

}



?>