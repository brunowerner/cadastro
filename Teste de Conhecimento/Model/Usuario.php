<?php

class Usuario{

	private $id;
	private $usuario;
	private $senha;
	private $status;

	public function setId($id){

		$this->id = $id;
	}

	public function getId(){

		return $this->id;
	}

	public function setUsuario($usuario){

		$this->usuario = $usuario;
	}

	public function getUsuario(){

		return $this->usuario;
	}

	public function setSenha($senha){

		$this->senha = $senha;
	}

	public function getSenha(){

		return $this->senha;
	}

	public function setStatus($status){

		$this->status = $status;
	}

	public function getStatus(){

		return $this->status;
	}

}


?>