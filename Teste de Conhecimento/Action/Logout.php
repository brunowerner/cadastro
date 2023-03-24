<?php

if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['autenticacao'])){

	die("Você não pode acessar esta página porque não está logado.<p><a href=\"http://localhost/Teste%20de%20Conhecimento/View/index.php\">Entrar</a></p>");
}else{
	session_unset();

	header('Location: ../View/index.php');	
}



?>