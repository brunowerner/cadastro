<?php

include_once '../Controller/ControllerPessoa.php';

include_once '../Includes/Protect.php';

if(isset($_POST['btn-cadastrar'])){
	$tamanho = sizeof($_POST) - 4;
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];
	$usuario_id = $_POST['usuario_id'];

	$countSucesso = 0;

	$controllerPessoa = new ControllerPessoa();
	$sucesso = $controllerPessoa->Create($nome, $email, $endereco, $usuario_id);

	$id_pessoa = $controllerPessoa->SelectMaxId();

	if($sucesso){
		for($i = 1;$i < $tamanho; $i++){
			$telefone = "telefone". $i;
			$sucesso2 = $controllerPessoa->CreateTelephone(intval($id_pessoa['MAX(id)']), $_POST[$telefone]);

			if($sucesso2){
				$countSucesso++;	
			}else{
				$_SESSION['mensagem'] += "Erro ao cadastrar o ".$telefone." ";
				header('Location: ../View/TelaPrincipal.php');
				break;
			}
		}

		if($countSucesso + 1 == $tamanho){
			$_SESSION['mensagem'] = "Cadastrado com sucesso!";
			header('Location: ../View/TelaPrincipal.php');
		}

	}else{
		$_SESSION['mensagem'] = "Erro ao cadastrar ";
		header('Location: ../View/TelaPrincipal.php');
	}
	
}