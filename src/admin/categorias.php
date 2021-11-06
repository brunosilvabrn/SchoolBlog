<main>
	<div class="box-postagens">
		<div class="titulo-postagens">
			<h1>Categorias</h1>
		</div>

		<div class="op-adicionar">
			<i class="fa fa-pencil-alt"></i><span>Adicionar Nova Categoria:</span>
			<a class="btn btn-outline-success" href="administrador/nova-categoria">NOVA CATEGORIA</a>
		</div>

		<div class="op-adicionar">
			<i class="fa fa-trash"></i><span>Excluir Categoria: <label class="esp">xxxxxxxx</label></span>
			<a class="btn btn-outline-danger" href="?pagina=excluir-categoria">EXCLUIR CATEGORIA</a>
		</div>

		<br>

		<div class="titulo-postagens">
			<h1>Lista de Categorias</h1>
		</div>
		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">CATEGORIA</th>
		      <th scope="col">QUANT. DE POSTAGENS</th>
		      <th scope="col">EDITAR</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php

		  	global $pdo;

		  	$sql = $pdo->prepare("SELECT * FROM categorias");
		  	$sql->execute();

		  	while($dados = $sql->fetch()) { 

		  		$categoria = $dados['codigo'];

		  		$db = $pdo->prepare("SELECT * FROM postagens WHERE categoria = :categoria");
		  		$db->bindValue(":categoria", $categoria);
		  		$db->execute();

		  		$quantidade = $db->rowCount();

		  	?>

		    <tr>
		      <th scope="row"><?php echo $dados['id']; ?></th>
		      <td><?php echo $dados['categoria']; ?></td>
		      <td><?php echo $quantidade; ?></td>
		      <td><a class="btn btn-info" href="?pagina=editar-categoria" role="button">Editar</a></td>
		    </tr>

		<?php } ?>
		    
		  </tbody>
		</table>
	</div>
	</div>
</main>