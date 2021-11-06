<!-- Header -->
<header>
	<div class="initial-logo">
		<label>
			<img src="assets/img/logo.jpg"> <!-- https://image.flaticon.com/icons/png/512/36/36154.png -->
			<span class="font-italic font-weight-bold">BLOG</span>
		</label>
	</div>
</header>
<!-- end Header -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
	<a class="navbar-brand" href="#">
    <img src="assets/img/icone.png" width="50" height="50" class="d-inline-block align-top img-nav" alt="">
    <span class="font-italic font-weight-bold pl-1">
    	Jornal da Escola 
    </span>
  	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<?php
	// Adicionar estilo a opção selecionada / CONFIGURAR -> 
	function ative($esc = array()) {
		
		$op = (isset($_GET['url'])) ? $_GET['url'] : 'home';
		$op = array_filter(explode('/', $op));

		if ($op[0] == $esc) {
			echo "active";
		}elseif ($op[0] == "noticia" && $esc == "noticias") {
			# code...
			echo "active";
		}elseif ($op[0] == "album" && $esc == "galeria") {
			# code...
			echo "active";
		}

	}

	?>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php ative("home") ?>">
				<a class="nav-link" href="home/">Início <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php ative("noticias") ?>">
				<a class="nav-link" href="noticias/">Noticias</a>
			</li>
			<li class="nav-item  <?php ative("revistas") ?>">
				<a class="nav-link" href="revistas/">Revistas</a>
			</li>
			<li class="nav-item <?php ative("galeria") ?>">
				<a class="nav-link" href="galeria/">Galeria</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Categorias
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<?php

				global $pdo;
                $db = $pdo->prepare("SELECT * FROM categorias");
                $db->execute();

                while ($cate = $db->fetch()) {
                           
				?>
				<a class="dropdown-item" href="noticias/c/<?php echo $cate['codigo']; ?>"><?php echo $cate['categoria']; ?></a>
			<?php } ?>

			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="noticias/c/todas">Todas</a>
				
				
			</li>
			<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto nav-flex-icons">
			<li class="nav-item" style="margin: auto; margin-bottom: -3px;">
				<a class="nav-link waves-effect waves-light" href="#">
					<i class="fab fa-instagram"></i>
				Siga no Instagram
				</a>
			</li>
		</ul>
	</div>
</nav>
<!-- end Navbar -->