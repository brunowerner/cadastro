<?php

include_once '../Controller/ControllerUsuario.php';

include_once '../Includes/Protect.php';

if(isset($_POST['btn-cadastrar'])){
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$status = $_POST['status'];
	
	$senha = password_hash($senha, PASSWORD_DEFAULT);
	
	$controllerUsuario = new ControllerUsuario();
	$sucesso = $controllerUsuario->Create($usuario, $senha, $status);
	if($sucesso){
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../View/TelaPrincipal.php');
	}else{
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../View/TelaPrincipal.php');
	}
}