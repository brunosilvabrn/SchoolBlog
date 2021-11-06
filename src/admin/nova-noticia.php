<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<main>
	<div class="box-postagens-noticia">
		<div class="titulo-postagens">
			<h1>Nova Noticia</h1>
		</div>
		<form enctype="multipart/form-data" method="POST">
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Titulo</label>
		    <textarea class="form-control" name="titulo" rows="2" maxlength="255" required></textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Subtitulo</label>
		    <textarea class="form-control" name="subtitulo" rows="2" required></textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Autor</label>
		    <input class="form-control" name="autor" maxlength="255" required></input>
		  </div>
		  <div class="custom-file file-img">
		    <input type="file" class="custom-file-input" name="image[]" accept="image/png, image/jpeg" required>
		    <label class="custom-file-label" for="validatedCustomFile">Selecione uma Imagem...</label>
		    <!-- <div class="invalid-feedback">Example invalid custom file feedback</div> -->
		  </div>
		  <div class="form-group margin-1">
		    <label for="exampleFormControlTextarea1">Conteudo</label>
		    <textarea class="form-control" id='editor1' name="conteudo" rows="4" required></textarea>
		  </div>
		  <br>
		  <div class="form-group">
		    <select class="custom-select" name="categoria" required>
		      <option value="todas">Selecione a Categoria da Postagem</option>
		      <?php
		      	require_once 'app/connection.php';
		      	global $pdo;
		      	$sql = $pdo->prepare("SELECT * FROM categorias");
		      	$sql->execute();
		      	while ($opcoes = $sql->fetch()) {
		      		echo '<option value='.$opcoes['codigo'].'>'.$opcoes['categoria'].'</option>';
		      	} 
		      ?>
		      
		    </select>
		    <div class="invalid-feedback">Example invalid custom select feedback</div>
		  </div>
		  <div class="btn-1">
		  	<button type="submit" class="btn btn-primary">Publicar</button>
		  </div>
		</form>

		<script>
			CKEDITOR.replace( 'editor1' );
		</script>


		<?php

			if(isset($_POST['titulo'])) {

				if(isset($_POST['conteudo'])) {

					global $pdo;

					require_once 'public/class/Administrador.php';
					$u = new Administrador();

					$titulo = addslashes($_POST['titulo']);
					$subtitulo = addslashes($_POST['subtitulo']);
					$autor = addslashes($_POST['autor']);
					$imagem = $_FILES['image'];
					$conteudo = $_POST['conteudo'];
					$categoria = addslashes($_POST['categoria']);


					if($u->UploadPostagem($titulo, $subtitulo, $autor, $imagem, $conteudo, $categoria)) {

						echo '
							<div class="container mt-4">
								<div class="row">
									<div class="btn btn-success col-md-6 m-auto">
										Postagem publicada com sucesso!
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
	</div>
</main>