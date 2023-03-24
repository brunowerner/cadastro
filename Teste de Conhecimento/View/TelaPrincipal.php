<?php

include_once '../Connection/Connection.php';

include_once '../Includes/Header.php';

include_once '../Includes/Message.php';

include_once '../Includes/Protect.php';

?> 

<div class="row">

	<div class="col s12 m6 push-m3">
		<br>
		<a href="../Action/Logout.php" class="btn right">Logout</a>
		<h3 class="light"> Usuários </h3>

		<table class="striped">
			<thead>
				<tr>
					<th>Id:</th>
					<th>Usuário:</th>
					<th>Status:</th>
				</tr>
			</thead>
			
			<tbody id="registrosUsuarios">
				
			</tbody>
		</table>
		<br>
		<a href="adicionarUsuario.php" class="btn">Adicionar usuário</a>
	</div>
</div>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Pessoas </h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Id:</th>
					<th>Nome:</th>
					<th>Email:</th>
					<th>Endereço:</th>
					<th>Telefone:</th>
				</tr>
			</thead>
			
			<tbody id="registrosPessoas">
				
			</tbody>
		</table>
		<br>
		<a href="AdicionarPessoa.php" class="btn">Adicionar pessoa</a>
	</div>
</div>



<script src="../Script/Usuario.js"></script>
<script src="../Script/Pessoa.js"></script>
<script>
	ListarUsuario();
	ListarPessoa();
</script>

<?php

include_once '../Includes/Footer.php';
?>