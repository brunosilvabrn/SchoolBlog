<?php

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = array_filter(explode('/', $url));


if(!isset($url[2])){
	echo "<script>window.location.href='administrador/galeria'</script>";
}

$id = $url[2];


$sql = $pdo->prepare("SELECT * FROM galeria WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() < 1){
	echo "<script>window.location.href='admin/postagens?msg=nao-encontrado'</script>";
}

$dados = $sql->fetch();

?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<main>
	<div class="box-postagens-noticia">
		<div class="titulo-postagens">
			<h1>Editar Galeria</h1>
		</div>
		<form method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Titulo</label>
		    <textarea class="form-control" name="titulo" id="exampleFormControlTextarea1" rows="2"><?php echo $dados["titulo"]; ?></textarea>
		  </div>
		  <div class="form-group margin-1">
		    <label for="exampleFormControlTextarea1">Descrição</label>
		    <textarea class="form-control" name="descricao" id='editor1' rows="1"><?php echo $dados["descricao"]; ?></textarea>
		  </div>		  
		 
		  <br>
		
		  <div class="btn-1">
		  	<button type="submit" class="btn btn-primary">Editar</button>
		  </div>
		</form>
	</div>
</main>
<?php

	if(isset($_POST["titulo"])) {

		if(isset($_POST['descricao'])) {

			require_once 'public/class/Administrador.php';
			$u = new Administrador();
			$id = $url[2];
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];

			if($u->updateGaleria($id, $titulo, $descricao)) {

				echo '
					<div class="container mt-4">
						<div class="row">
							<div class="btn btn-success col-md-6 m-auto">
								Galeria editada com sucesso!
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

?>

<script>
	CKEDITOR.replace( 'editor1' );
</script>
