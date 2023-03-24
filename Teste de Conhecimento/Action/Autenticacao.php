<?php

include_once "../Controller/ControllerUsuario.php";

session_start();
$_SESSION['autenticacao'] = false;

if(isset($_GET['usuario']) & isset($_GET['senha'])){
	$usuario = $_GET['usuario'];
	$senha = $_GET['senha'];
	
	$controllerUsuario = new ControllerUsuario();
	$registros = $controllerUsuario->Authentication($usuario);
	if($registros > 0){
		foreach($registros as $dados){
			if(password_verify($senha, $dados['senha'])){
				$_SESSION['autenticacao'] = true;
			}
		}
	}	
}

	echo $_SESSION['autenticacao'];
?>