<?php

include_once '../Connection/Connection.php';

include_once '../Includes/Header.php';

include_once '../Controller/ControllerUsuario.php';

include_once '../Includes/Protect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$controllerUsuario = new ControllerUsuario();
	$dados = $controllerUsuario->SelectById($id);
}

?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar </h3>
		<form action="../Action/UpdateUsuario.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
			<div class="input-field col s12">
				<input type="text" name="usuario" id="usuario" value="<?php echo $dados['usuario']; ?>">
				<label for="usuario">Usuário</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="senha" id="senha">
				<label for="senha">Senha</label>
			</div>
			<div class="input-field col s12">
    			<select name="status" id="status">
    				<?php
    					if($dados['status'] == "Ativo"){
    						echo "<option value='Ativo' selected>Ativo</option>";
      						echo "<option value='Inativo'>Inativo</option>";
    					}else{
    						echo "<option value='Ativo'>Ativo</option>";
      						echo "<option value='Inativo' selected>Inativo</option>";
    					}
    				 ?>
    			</select>
    			<label>Status</label>
  			</div>
			<button type="submit" name="btn-editar" class="btn"> Atualizar </button>
			<a href="TelaPrincipal.php" class="btn green"> Lista de usuários </a>
		</form>	
	</div>
</div>

<?php

include_once '../Includes/Footer.php';
?>