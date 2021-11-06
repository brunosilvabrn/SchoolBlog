<?php

global $pdo;

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = array_filter(explode('/', $url));

if(!isset($url[2])){
	echo "<script>window.location.href='admin/slider'</script>";
}

$id = $url[2];


$sql = $pdo->prepare("SELECT * FROM revista WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() < 1){
	echo "<script>window.location.href='admin/postagens?msg=nao-encontrado'</script>";
}

while($dado = $sql->fetch()) {

	?>
		<main>
			<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
			<div class="box-postagens-noticia">
				<div class="titulo-postagens">
					<h1>Editar Revista</h1>
				</div>
				<form method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Titulo</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="titulo" rows="2"><?php echo $dado["titulo"] ?></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Texto</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="2"><?php echo $dado["descricao"] ?></textarea>
				  </div>
				  
				  <div class="btn-1 mt-4">
				  	<button type="submit" class="btn btn-primary" name="conf">Editar</button>
				  </div>
				</form>
			</div>
		</main>
		<script>
			CKEDITOR.replace( 'descricao' );
		</script>

	<?php

	if(isset($_POST["titulo"])) {

		if(isset($_POST['descricao'])) {

			require_once 'public/class/Administrador.php';
			$u = new Administrador();
			$id = $url[2];
			$titulo = addslashes($_POST['titulo']);
			$descricao = addslashes($_POST['descricao']);

			if($u->updateRevista($id, $titulo, $descricao)) {

				echo '
					<div class="container mt-4">
						<div class="row">
							<div class="btn btn-success col-md-6 m-auto">
								Revista editada com sucesso!
							</div>
						</div>
					</div>
				';


			}else {

				echo '
				<div class="container mt-4">
					<div class="row">
						<div class="btn btn-danger col-md-6 m-auto">
							Erro ao editar!
						</div>
					</div>
				</div>
				';

			}

		}else {

			echo '
				<div class="container mt-4">
					<div class="row">
						<div class="btn btn-danger col-md-6 m-auto">
							Preencha todos os campos!
						</div>
					</div>
				</div>
			';

		}

	}


	}

	

?>
