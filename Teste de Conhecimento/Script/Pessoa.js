async function DeletarPessoa(id){
	
	var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

	if(confirmar == true){
		const dados = await fetch('../Action/DeletePessoa.php?id=' + id);

		const resposta = await dados.text();

		if(resposta){
			M.toast({html: "Excluído com sucesso." });
			ListarPessoa();
		}else{
			M.toast({html: "Erro ao excluir." });
			
		}	
	}

}

async function ListarPessoa(){
	const tbody = document.getElementById("registrosPessoas");
	const dados = await fetch('../Action/InicializarTabelaPessoa.php');
	const resposta = await dados.text();
	tbody.innerHTML = resposta;
}


async function Logout(){

	const dados = await fetch('../Action/Logout.php');

	window.location.href = "http://localhost/Teste%20de%20Conhecimento/View/index.php"; 
	
}

var count = 1;

function AdicionarTelefone(){
	const div  = document.getElementById("divTelefone"); 
	div.innerHTML += `<div id='campoTelefone${count}' class='input-field col s12'><input type='text' name='telefone${count}' id='telefone${count}'><label for='telefone${count}'>Telefone${count}</label></div>`;
	count++; 

}

function AdicionarTelefoneComValor(valor){
	const div  = document.getElementById("divTelefone"); 
	div.innerHTML += `<div id='campoTelefone${count}' class='input-field col s12'><input type='text' name='telefone${count}' id='telefone${count}' value='${valor}'><label for='telefone${count}'>Telefone${count}</label></div>`;
	count++; 

}

function ExcluirTelefone(){
	if(count > 2){
		count--;
		const element = document.getElementById(`campoTelefone${count}`);
		element.remove();
	}else{
		M.toast({html: "É necessario pelo menos um telefone" });
	}
	
	
}




