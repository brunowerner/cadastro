async function DeletarUsuario(id){
	
	var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

	if(confirmar == true){
		const dados = await fetch('../Action/DeleteUsuario.php?id=' + id);

		const resposta = await dados.text();

		if(resposta){
			M.toast({html: "Excluído com sucesso." });
			ListarUsuario();
		}else{
			M.toast({html: "Erro ao excluir." });
			
		}	
	}

	

}

async function ListarUsuario(){
	const tbody = document.getElementById("registrosUsuarios");
	const dados = await fetch('../Action/InicializarTabelaUsuario.php');
	const resposta = await dados.text();
	tbody.innerHTML = resposta;
}


