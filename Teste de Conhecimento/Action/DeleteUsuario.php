<?php

include_once "../Controller/ControllerUsuario.php";

include_once '../Includes/Protect.php';

if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	$controllerUsuario = new ControllerUsuario();
	$sucesso = $controllerUsuario->Delete($id);
	
}

echo $sucesso;