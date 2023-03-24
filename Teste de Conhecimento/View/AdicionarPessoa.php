<?php

include_once '../Includes/Header.php';

include_once '../Controller/ControllerPessoa.php';

include_once '../Includes/Protect.php';
?>

<script src="../Script/Pessoa.js"></script>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Nova Pessoa </h3>
		<form action="../Action/CreatePessoa.php" method="POST" >
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome">
				<label for="nome">Nome</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="email" id="email">
				<label for="email">Email</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="endereco" id="endereco">
				<label for="endereco">Endereço</label>
			</div>
			<div class="input-field col s12">
    			<select name="usuario_id" id="usuario_id">
      				
      				<?php
      					
      					$controllerPessoa = new ControllerPessoa();
						$registros = $controllerPessoa->SelectUserWithoutPerson();
						if($registros > 0){
							foreach($registros as $dados){
								?>
								<option value="<?php echo $dados['id']; ?>"><?php echo $dados['id']; ?></option>
								<?php
							}
						}
      				?>
      				
    			</select>
    			<label>Usuário id</label>
  			</div>

			<div id="divTelefone">

			</div>

			<script>AdicionarTelefone();</script>

			<div class="input-field col s12">
			<a onclick="AdicionarTelefone()" class="btn-floating green"><i class="material-icons">add</i></a>
			<a style="margin-left:5px" onclick="ExcluirTelefone()" class="btn-floating red"><i class="material-icons">delete</i></a>
			</div>
			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="TelaPrincipal.php" class="btn green"> Lista de pessoas </a>
		</form>	
	</div>
</div>

<?php
//Footer
include_once '../Includes/Footer.php';
?>