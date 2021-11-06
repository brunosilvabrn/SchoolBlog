
<main>
	<div class="box-postagens">
		<div class="titulo-postagens">
			<h1>Slider</h1>
		</div>

		<div class="op-adicionar mb-4">
			<i class="fa fa-images"></i><span>Adicionar Novo Slider:</span>
			<a class="btn btn-outline-success" href="administrador/novo-slider">Adicionar novo Slider</a>
		</div>

		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">TITULO</th>
		      <th scope="col">TEXTO</th>
		      <th scope="col">EDITAR</th>
		      <th scope="col">EXCLUIR</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php

		  	global $pdo;
		  	
		  	$sql = $pdo->prepare("SELECT * FROM slider");
		  	$sql->execute();

		  	while($dados = $sql->fetch()){


		  		?>
					<tr>
				      <th scope="row"><?php echo $dados['id'] ?></th>
				      <td><?php echo $dados['titulo'] ?></td>
				      <td><?php echo $dados['texto'] ?></td>
				      <td><a class="btn btn-info" href="administrador\editar-slider\<?php echo $dados['id'] ?>" role="button">Editar</a></td>
				      <td><a class="btn btn-danger" href="administrador\excluir-slider\<?php echo $dados['id'] ?>" role="button">Excluir</a></td>
				    </tr>

				<?php
		  		
		  	}

		  	?>
	
		  </tbody>
		</table>
	</div>
</main>