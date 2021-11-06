<main>
	<div class="box-card">
		<div class="titulo-postagens">
			<h1>Painel do Administrador</h1>
		</div>
	</div>
	<br>
	<div class="box-card">

		<?php
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM postagens");
		$sql->execute();
		?>

		<div class="card-initial">
			<span>Noticias</span>
			<hr>
			<i class="fa fa-desktop"></i>
			<label>Quantidade: <?php echo $sql->rowCount(); ?></label>
		</div>

		<?php
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM galeria");
		$sql->execute();
		?>

		<div class="card-initial">
			<span>Álbuns</span>
			<hr>
			<i class="fa fa-desktop"></i>
			<label>Quantidade: <?php echo $sql->rowCount(); ?></label>
		</div>

		<?php
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM revista");
		$sql->execute();
		?>

		<div class="card-initial">
			<span>revistas</span>
			<hr>
			<i class="fa fa-desktop"></i>
			<label>Quantidade: <?php echo $sql->rowCount(); ?></label>
		</div>

		<?php
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM slider");
		$sql->execute();
		?>

		<div class="card-initial">
			<span>Sliders</span>
			<hr>
			<i class="fa fa-desktop"></i>
			<label>Quantidade: <?php echo $sql->rowCount(); ?></label>
		</div>
		
		<?php
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM categorias");
		$sql->execute();
		?>

		<div class="card-initial">
			<span>Categorias</span>
			<hr>
			<i class="fa fa-desktop"></i>
			<label>Quantidade: <?php echo $sql->rowCount(); ?></label>
		</div>

	</div>
</main>
