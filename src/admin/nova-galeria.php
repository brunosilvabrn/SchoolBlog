<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<main>
	<div class="box-postagens-noticia">
		<div class="titulo-postagens">
			<h1>Nova Galeria</h1>
		</div>
		<form enctype="multipart/form-data" method="POST">
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Titulo</label>
		    <input class="form-control" name="titulo" id="exampleFormControlTextarea1"></input>
		  </div>
		  <div class="form-group margin-1">
		    <label for="exampleFormControlTextarea1">Descrição</label>
		    <textarea class="form-control" name="descricao" id='editor1' rows="1"></textarea>
		  </div>		  
		  <div class="custom-file file-img">
		    <input type="file" class="custom-file-input" name="imagens[]" id="validatedCustomFile" accept="image/jpeg, image/png" multiple=""  required>
		    <label class="custom-file-label" for="validatedCustomFile">Selecione as Imagem...</label>
		    <div class="invalid-feedback">Example invalid custom file feedback</div>
		  </div>
		  <br>
		  <div class="btn-1">
		  	<button type="submit" class="btn btn-primary">Publicar</button>
		  </div>
		</form>
	</div>

	<?php

		if(isset($_POST['titulo'])) {

			if(isset($_POST['descricao'])) {

				global $pdo;

				require_once 'public/class/Administrador.php';
				$u = new Administrador();

				$titulo = addslashes($_POST['titulo']);
				$descricao = $_POST['descricao'];
				$imagem = $_FILES['imagens'];

				if($u->novaGaleria($titulo, $descricao, $imagem)) {

					echo '
						<div class="container mt-4">
							<div class="row">
								<div class="btn btn-success col-md-6 m-auto">
									Galeria publicada com sucesso!
								</div>
							</div>
						</div>
					';


				}else {

					echo '
					<div class="container mt-4">
						<div class="row">
							<div class="alert col-md-6 m-auto">
								Erro ao publicar!
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

</main>