<?php

include_once '../Includes/Header.php';

include_once '../Includes/Protect.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Usuário </h3>
		<form action="../Action/CreateUsuario.php" method="POST">
			<div class="input-field col s12">
				<input type="text" name="usuario" id="usuario">
				<label for="usuario">Usuário</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="senha" id="senha">
				<label for="senha">Senha</label>
			</div>
			<div class="input-field col s12">
    			<select name="status" id="status">
      				<option value="" disabled selected>Choose your option</option>
      				<option value="Ativo">Ativo</option>
      				<option value="Inativo">Inativo</option>
    			</select>
    			<label>Status</label>
  			</div>
			
			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="TelaPrincipal.php" class="btn green"> Lista de usuários </a>
		</form>	
	</div>
</div>

<?php

include_once '../Includes/Footer.php';
?>