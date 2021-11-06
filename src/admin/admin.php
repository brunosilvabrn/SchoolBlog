<script type="text/javascript">
	function msg() {
		alert("Para excluir um Administrador é necessario procurar o Suporte! Obrigado pela atenção.")
	};

	function msg2() {
		alert("Para adicionar um novo Administrador é necessario procurar o Suporte! Obrigado pela atenção.")
	}
</script>

<main>
	<div class="box-postagens">
		<div class="titulo-postagens">
			<h1>Administrador</h1>
		</div>

		<div class="op-adicionar">
			<i class="fa fa-plus"></i><span>Adicionar Novo Administrador:</span>
			<a class="btn btn-outline-success" onclick="msg2()" >NOVO ADMINISTRADOR</a>
		</div>

		<div class="op-adicionar">
			<i class="fa fa-trash"></i><span>Excluir Administrador: <label class="esp">xxxxxxxx</label></span>
			<a class="btn btn-outline-danger" onclick="msg()" >EXCLUIR ADMINISTRADOR</a>
		</div>

		<br>

		<div class="titulo-postagens">
			<h1>Lista de Administradores</h1>
		</div>
		<table class="table table-striped">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col" style="width: 50px;">ID</th>
		      <th scope="col">NOME</th>
		      <!-- <th scope="col">EDITAR</th> -->
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	global $pdo;
	
			$sql = $pdo->prepare("SELECT * FROM administradores");
			$sql->execute();

			while ($dados = $sql->fetch()) {
				
		  	?>
		    <tr>
		      <th scope="row"><?php echo $dados["id"]; ?></th>
		      <td><?php echo $dados["usuario"]; ?></td>
		    </tr>
		<?php  }?>
		    
		    </tr>
		  </tbody>
		</table>
	</div>
	</div>
</main>