
<main>
	<div class="box-postagens">
		<div class="titulo-postagens">
			<h1>Revista</h1>
		</div>
		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">TITULO</th>
		      <th scope="col">DATA</th>
		      <th scope="col">EDITAR</th>
		      <th scope="col">EXCLUIR</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	global $pdo;
		  	$sql = $pdo->prepare("SELECT * FROM revista ORDER BY id DESC");
		  	$sql->execute();

		  	while ($dados = $sql->fetch()) {
		  		# code...
		  	?>
		    <tr>
		      <th scope="row"><?php echo  $dados["id"]; ?></th>
		      <td><?php echo  $dados["titulo"]; ?></td>
		      <td><?php echo  $dados["data"]; ?></td>
		      <td><a class="btn btn-info" href="administrador/editar-revista/<?php echo  $dados["id"]; ?>" role="button">Editar</a></td>
		      <td><a class="btn btn-danger" href="administrador/excluir-revista/<?php echo  $dados["id"]; ?>" role="button">Excluir</a></td>
		    </tr>
		<?php } ?>
		   
		  </tbody>
		</table>
	</div>
</main>