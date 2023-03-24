<?php

include_once '../Controller/ControllerPessoa.php';

include_once '../Includes/Protect.php';

if(isset($_POST['btn-cadastrar'])){
	$tamanho = sizeof($_POST) - 6;
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];
	$usuario_id = $_POST['usuario_id'];
	

	$countSucesso = 0;

	$controllerPessoa = new ControllerPessoa();
	$sucesso = $controllerPessoa->Update($nome, $email, $endereco, $usuario_id, $id);

	if($sucesso){

	$ids = $controllerPessoa->SelectIdTelephone($id);


	$qtd = count($ids);
	

	if($tamanho == $qtd){
		for($i = 1;$i <= $tamanho; $i++){
			$telefone = "telefone". $i;
			if($i <= $qtd){
				$sucesso2 = $controllerPessoa->UpdateTelephone($ids[$i-1]['id'], $_POST[$telefone]);

				if($sucesso2){
					$countSucesso++;
				}else{
					break;
				}

			}else{

			}
		}

		if($countSucesso == $tamanho){
			$_SESSION['mensagem'] = "Editado com sucesso!";
			header('Location: ../View/TelaPrincipal.php');
		}else{
			$_SESSION['mensagem'] = "Erro ao atualizar ";
			header('Location: ../View/TelaPrincipal.php');
		}

	}

	if($tamanho > $qtd){
		for($i = 1;$i <= $tamanho; $i++){
			$telefone = "telefone". $i;
			if($i <= $qtd){
				$sucesso2 = $controllerPessoa->UpdateTelephone($ids[$i-1]['id'], $_POST[$telefone]);

				if($sucesso2){
					$countSucesso++;
				}else{
					break;
				}

			}else{
				$sucesso3 = $controllerPessoa->CreateTelephone($id, $_POST[$telefone]);

				if($sucesso3){
					$countSucesso++;
				}else{
					break;
				}
			}
		}

		if($countSucesso == $tamanho){
			$_SESSION['mensagem'] = "Editado com sucesso!";
			header('Location: ../View/TelaPrincipal.php');
		}else{
			$_SESSION['mensagem'] = "Erro ao atualizar ";
			header('Location: ../View/TelaPrincipal.php');
		}
	}

	if($tamanho < $qtd){
		for($i = 1;$i <= $qtd; $i++){
			$telefone = "telefone". $i;
			if($i <= $tamanho){
				$sucesso2 = $controllerPessoa->UpdateTelephone($ids[$i-1]['id'], $_POST[$telefone]);

				if($sucesso2){
					$countSucesso++;
				}else{
					break;
				}

			}else{
				$sucesso3 = $controllerPessoa->DeleteTelephone($ids[$i-1]['id']);

				if($sucesso3){
					$countSucesso++;
				}else{
					break;
				}
			}
		}

		if($countSucesso == $qtd){
			$_SESSION['mensagem'] = "Editado com sucesso!";
			header('Location: ../View/TelaPrincipal.php');
		}else{
			$_SESSION['mensagem'] = "Erro ao atualizar ";
			header('Location: ../View/TelaPrincipal.php');
		}

	}

	}else{
		$_SESSION['mensagem'] = "Erro ao atualizar ";
		header('Location: ../View/TelaPrincipal.php');
	}

}