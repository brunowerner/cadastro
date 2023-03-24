<?php

require_once ('../Connection/Connection.php');

class ControllerPessoa{

	public function SelectWithFirstTelephone(){

		$sql = "SELECT p.id, p.nome, p.email, p.endereco, t.telefone FROM pessoa AS p INNER JOIN telefone AS t ON p.id = t.pessoa_id GROUP BY p.id;";
		$stmt = getConnection()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		return $registros;
	}

	public function SelectUserWithoutPerson(){

		$sql = "SELECT u.id FROM usuario AS u LEFT JOIN pessoa AS p ON  u.id = p.usuario_id WHERE p.usuario_id IS NULL;";
		$stmt = getConnection()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		return $registros;
	}

	public function SelectMaxId(){
		$sql = "SELECT MAX(id) FROM pessoa;";
		$stmt = getConnection()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetch();

		return $registros;
	}

	public function SelectById($id){
		$sql = "SELECT * FROM pessoa WHERE id = ?;";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$registros = $stmt->fetch();

		return $registros;
	}

	public function SelectTelephoneById($id){
		$sql = "SELECT * FROM telefone WHERE pessoa_id = ?;";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		return $registros;
	}

	public function SelectIdTelephone($pessoa_id){
		$sql = "SELECT id FROM telefone WHERE pessoa_id = ?;";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $pessoa_id);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		return $registros;	
	}

	public function SelectCountTelephoneById($pessoa_id){
		$sql = "SELECT COUNT(*) FROM telefone WHERE pessoa_id = ?;";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$registros = $stmt->fetch();

		return $registros;
	}

	public function Create($nome,$email,$endereco,$usuario_id){

		$sql = "INSERT INTO pessoa(nome,email,endereco,usuario_id) VALUES (?,?,?,?)";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $email);
		$stmt->bindValue(3, $endereco);
		$stmt->bindValue(4, $usuario_id);
		$sucesso = $stmt->execute();

		return $sucesso;
	}

	public function CreateTelephone($pessoa_id, $telefone){

		$sql = "INSERT INTO telefone(pessoa_id, telefone) VALUES (?,?)";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $pessoa_id);
		$stmt->bindValue(2, $telefone);
		$sucesso = $stmt->execute();

		return $sucesso;
	}


	public function Update($nome, $email, $endereco, $usuario_id, $id){

		$sql = "UPDATE pessoa SET nome = ?, email = ?, endereco = ?, usuario_id = ? WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $email);
		$stmt->bindValue(3, $endereco);
		$stmt->bindValue(4, $usuario_id);
		$stmt->bindValue(5, $id);
		$sucesso = $stmt->execute();

		return $sucesso;

	}

	public function UpdateTelephone($id, $telefone){

		$sql = "UPDATE telefone SET telefone = ? WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $telefone);
		$stmt->bindValue(2, $id);
		$sucesso = $stmt->execute();

		return $sucesso;
	}

	public function Delete($id){

		$sql = "DELETE FROM pessoa WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$sucesso = $stmt->execute();

		return $sucesso;
	}

	public function DeleteTelephone($id){

		$sql = "DELETE FROM telefone WHERE id = ?";
		$stmt = getConnection()->prepare($sql);
		$stmt->bindValue(1, $id);
		$sucesso = $stmt->execute();

		return $sucesso;
	}

}

?>