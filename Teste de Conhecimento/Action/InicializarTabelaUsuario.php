<?php

include_once '../Controller/ControllerUsuario.php';

				$controllerUsuario = new ControllerUsuario();
				$registros = $controllerUsuario->Select();
				if($registros > 0){
				foreach($registros as $dados){
				?>
				<tr>
					<td><?php echo $dados['id']; ?></td>
					<td><?php echo $dados['usuario']; ?></td>
					<td><?php echo $dados['status']; ?></td>
					<td><a href="VisualizarUsuario.php?id=<?php echo $dados['id']; ?>" class="btn-floating green"><i class="material-icons">visibility</i></a></td>
					<td><a href="EditarUsuario.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
					<td><a onclick="DeletarUsuario(<?php echo $dados['id']; ?>)" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

				</tr>
				<?php
				};
				};				
				?>