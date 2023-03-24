async function Login(){
	var usuario = document.getElementById('usuario').value;
	var senha = document.getElementById('senha').value;
	
		const dados = await fetch('../Action/Autenticacao.php?usuario=' + usuario + '&senha=' + senha);

		const resposta = await dados.text();

		if(resposta){
			M.toast({html: "Login com sucesso." });
			window.location.href = "http://localhost/Teste%20de%20Conhecimento/View/TelaPrincipal.php"; 
		}else{
			M.toast({html: "Erro ao efetuar o login." });
			
		}	
	

}
