<nav class="nav flex-column bd-sidenav">
	<div class="logo">
		<span>DASHBOARD</span>
	</div>
	<?php 
		global $pdo;
		$id = $_SESSION["idUser"];
		$sql = $pdo->prepare("SELECT * FROM administradores WHERE id = $id");
		$sql->execute();

		$user = $sql->fetch();
	?>
	<li class="nav-item">
	    <a class="nav-link disabled" href="administrador/dashboard" tabindex="-1" aria-disabled="true"><i class="fa fa-user"></i><span><?php echo $user["usuario"] ?></span></a>
	 </li>
	<ul class="nav flex-column bd-sidenav">
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/dashboard"><i class="fa fa-tachometer-alt"></i><span>Painel de Controle</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/postagens"><i class="fa fa-chart-line"></i><span>Postagens</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/galeria"><i class="fa fa-images"></i><span>Galeria</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/revista"><i class="fa fa-newspaper"></i><span>Revista</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/adicionar"><i class="fa fa-plus-square"></i><span>Adicionar</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/slider"><i class="fa fa-sliders-h"></i></i><span>Slider</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/categorias"><i class="fa fa-desktop"></i><span>Categorias</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/admin"><i class="fa fa-user-shield"></i><span>Administrador</span></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="administrador/sair"><i class="fa fa-arrow-alt-circle-left"></i><span>Sair</span></a>
	  </li>

	</ul>
</nav>