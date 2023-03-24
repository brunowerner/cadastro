<?php

class Pessoa{

	private $id;
	private $nome;
	private $email;
	private $endereco;
	private $telefone;
	private $usuario_id;

	public function setId($id){

		$this->id = $id;
	}

	public function getId(){

		return $this->id;
	}

	public function setNome($nome){

 		$this->nome = $nome;
	}

	public function getNome(){

		return $this->nome;
	}

	public function setEmail($email){

		$this->email = $email;
	}

	public function getEmail(){

		return $this->email;
	}

	public function setEndereco($endereco){

		$this->endereco = $endereco;
	}

	public function getEndereco(){

		return $this->endereco;
	}

	public function setTelefone($telefone){

		$this->telefone = $telefone;
	}

	public function getTelefone(){

		return $this->telefone;
	}

	public function setUsuario_id($usuario_id){

		$this->usuario_id = $usuario_id;
	}

	public function getUsuario_id(){

		return $this->usuario_id;
	}

}





?>