
<main>
	<div class="box-postagens-noticia">
		<div class="titulo-postagens">
			<h1>Novo Slider</h1>
		</div>
		<form enctype="multipart/form-data" method="POST">
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Titulo</label>
		    <textarea class="form-control" name="titulo" rows="2" maxlength="255" required></textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Texto</label>
		    <textarea class="form-control" name="texto" rows="2" maxlength="255" required></textarea>
		  </div>
		 
		  <div class="custom-file file-img">
		    <input type="file" class="custom-file-input" name="image[]" accept="image/png, image/jpeg" required>
		    <label class="custom-file-label" for="validatedCustomFile">Selecione uma Imagem...</label>
		   
		  </div>
		
		  <br>
		  
		  <div class="btn-1">
		  	<button type="submit" class="btn btn-primary">Publicar</button>
		  </div>
		</form>

		<?php

			if(isset($_POST['titulo'])) {

				if(isset($_POST['texto'])) {

					global $pdo;

					require_once 'public/class/Administrador.php';
					$u = new Administrador();

					$titulo = addslashes($_POST['titulo']);
					$texto = addslashes($_POST['texto']);
					$imagem = $_FILES['image'];

					// var_dump($imagem); exit();

					if($u->upSlider($titulo, $texto, $imagem)) {

						echo '
							<div class="container mt-4">
								<div class="row">
									<div class="btn btn-success col-md-6 m-auto">
										Slider publicado com sucesso!
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