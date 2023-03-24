<?php

include_once '../Controller/ControllerPessoa.php';

				$controllerPessoa = new ControllerPessoa();
				$registros = $controllerPessoa->SelectWithFirstTelephone();
				if($registros > 0){
				foreach($registros as $dados){
				?>
				<tr>
					<td><?php echo $dados['id']; ?></td>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td><?php echo $dados['endereco']; ?></td>
					<td><?php echo $dados['telefone']; ?></td>
					<td><a href="VisualizarPessoa.php?id=<?php echo $dados['id']; ?>" class="btn-floating green"><i class="material-icons">visibility</i></a></td>
					<td><a href="EditarPessoa.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
					<td><a onclick="DeletarPessoa(<?php echo $dados['id']; ?>)" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

				</tr>
				<?php
				};
				};				
				?>