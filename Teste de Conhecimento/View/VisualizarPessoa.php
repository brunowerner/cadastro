<?php

include_once '../Includes/Header.php';

include_once '../Controller/ControllerPessoa.php';

include_once '../Includes/Protect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$controllerPessoa = new ControllerPessoa();
	$dados = $controllerPessoa->SelectById($id);
}
?>




<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Visualizar</h3>
		<form action="../Action/UpdatePessoa.php" method="POST" >
			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
			<div class="input-field col s12">
				<input type="text" name="nome" value="<?php echo $dados['nome']; ?>" id="nome" disabled>
				<label for="nome">Nome</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="email" value="<?php echo $dados['email']; ?>" id="email" disabled>
				<label for="email">Email</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="endereco" value="<?php echo $dados['endereco']; ?>" id="endereco" disabled>
				<label for="endereco">Endereço</label>
			</div>
			<div class="input-field col s12">
    			<select name="usuario_id" id="usuario_id" disabled>
      				<option value="<?php echo $dados['usuario_id']; ?>"><?php echo $dados['usuario_id']; ?></option>
					
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
  			<?php
  				if(isset($_GET['id'])){
				$id = $_GET['id'];
					
				$controllerPessoa = new ControllerPessoa();
				$registros = $controllerPessoa->SelectTelephoneById($id);
		
				$i = 0;
				if($registros > 0){
				foreach($registros as $dados){
				$i++;
				$telefone = "telefone". $i;
  			?>
  			<div class="input-field col s12">
				<input type="text" name="<?php echo $telefone; ?>" id="<?php echo $telefone; ?>" value="<?php echo $dados['telefone']; ?>" disabled>
				<label for="<?php echo $telefone; ?>"><?php echo $telefone; ?></label>
			</div>

			<?php
			}
			}
			}
			?>

			<a href="TelaPrincipal.php" class="btn green"> Lista de pessoas </a>
		</form>	
	</div>
</div>

<?php

include_once '../Includes/Footer.php';
?>