<?php


	function loadPagina() {
		  
		global $pdo;
	                        
	    $sql = $pdo->prepare("SELECT * FROM postagens ORDER BY id DESC");
	    $sql->execute();

	    while($dados = $sql->fetch()){

	  ?>

	    <div class="card m-2 shadow text-center" style="">
	      <img class="card-img-top" src="<?php echo 'public/uploads/'.$dados['image']; ?>" alt="Imagem de capa do card">
	      <div class="card-body">
	        <h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
	        <p class="card-text text-left"><?php echo substr($dados['conteudo'], 0, 250); ?>...</p>
	        <a href="noticia/<?php echo $dados['url'] ?>" class="btn btn-primary">Ler Mais</a>
	      </div>
	      <div class="card-footer">
	        <small class="text-muted"><?php echo $dados['data']; ?></small>
	      </div>
	    </div>

	    <?php

		}
 	}


	$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
	$url = array_filter(explode('/', $url));

	if (empty($url[1])) {
		loadPagina();
			
	}elseif ($url[1] == 'c' && !empty($url[2]) ) {

		$parametro = $url[2];

		global $pdo;

		$db = $pdo->prepare("SELECT * FROM categorias WHERE codigo = :categoria");
		$db->bindValue(":categoria", $parametro);
		$db->execute();

		if ($db->rowCount() < 1) {
			loadPagina();
			
		}else{
	                        
		$sql = $pdo->prepare("SELECT * FROM postagens WHERE categoria = :categoria");
		$sql->bindValue(":categoria", $parametro);
		$sql->execute();

		if ($sql->rowCount() < 1) {
			?>
			<div class="card m-2 shadow text-center">
				<div class="card-body">
					<h1 class="card-title">Nenhuma Publicação encontrada nesta categoria.</h1>
				</div>
			</div>
			<?php
		}else {


		while($dados = $sql->fetch()){ 

		?>


			<div class="card m-2 shadow text-center" style="">
			  <img class="card-img-top" src="<?php echo 'public/uploads/'.$dados['image']; ?>" alt="Imagem de capa do card">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
			    <p class="card-text text-left"><?php echo substr($dados['conteudo'], 0, 250); ?>...</p>
			    <a href="#" class="btn btn-primary">Ler Mais</a>
			  </div>
			  <div class="card-footer">
			    <small class="text-muted"><?php echo $dados['data']; ?></small>
			  </div>
			</div>


		<?php

		}
		}
	}

	}

	// DEBUG
	// echo "<pre>";

	// print_r($url);

	// echo "</pre>";


?>