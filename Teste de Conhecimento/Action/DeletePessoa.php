<?php

include_once "../Controller/ControllerPessoa.php";

include_once '../Includes/Protect.php';

if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	$controllerPessoa = new ControllerPessoa();
	$dados = $controllerPessoa->SelectTelephoneById($id);

	$sucesso = false;
	foreach($dados as $telefone){
		$sucesso = $controllerPessoa->DeleteTelephone($telefone['id']);
		if($sucesso){
			
		}else{
			$_SESSION['mensagem'] += "Erro ao deletar o ".$telefone['id']." ";
			header('Location: ../View/TelaPrincipal.php');
			break;
		}
	}
	if($sucesso){
		$sucesso2 = $controllerPessoa->Delete($id);

		if($sucesso2){
			$_SESSION['mensagem'] = "Cadastrado com sucesso!";
			header('Location: ../View/TelaPrincipal.php');
		}else{
			$_SESSION['mensagem'] = "Erro ao cadastrar ";
			header('Location: ../View/TelaPrincipal.php');
		}
	}else{
		$_SESSION['mensagem'] = "Erro ao cadastrar ";
		header('Location: ../View/TelaPrincipal.php');
	}	
		
}

echo $sucesso2;