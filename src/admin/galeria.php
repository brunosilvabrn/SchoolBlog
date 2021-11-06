
<main>
	<div class="box-postagens">
		<div class="titulo-postagens">
			<h1>Galeria</h1>
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
		  	$sql = $pdo->prepare("SELECT * FROM galeria ORDER BY id DESC");
		  	$sql->execute();

		  	while ($dados = $sql->fetch()) {

		  	?>
		    <tr>
		      <th scope="row"><?php echo $dados["id"]; ?></th>
		      <td><?php echo $dados["titulo"]; ?></td>
		      <td>08/08/2020</td>
		      <td><a class="btn btn-info" href="administrador/editar-galeria/<?php echo $dados["id"]; ?>" role="button">Editar</a></td>
		      <td><a class="btn btn-danger" href="administrador/excluir-galeria/<?php echo $dados["id"]; ?>" role="button">Excluir</a></td>
		    </tr>
		<?php } ?>
		  </tbody>
		</table>
	</div>
</main>