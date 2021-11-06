<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<main>
	<div class="box-postagens-noticia">
		<div class="titulo-postagens">
			<h1>Nova Revista</h1>
		</div>
		<form   enctype="multipart/form-data" method="POST">
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Titulo</label>
		    <input class="form-control" name="titulo" id="exampleFormControlTextarea1" rows="2"></input>
		  </div>
		  <div class="form-group margin-1">
		    <label for="exampleFormControlTextarea1">Descrição</label>
		    <textarea class="form-control" name="descricao" id='editor1' rows="1"></textarea>
		  </div>	
		  <label for="exampleFormControlTextarea1">Os Arquivos devem estar em <strong>png</strong> ou <strong>jpeg</strong>. Caso queira coverter um arquivo em <strong>PDF</strong> para png ou jpeg <a href="https://www.freepdfconvert.com/pt/pdf-para-png" target="_blank">Clique aqui.</a></label>	  
		  <div class="custom-file file-img">

		    <input type="file" class="custom-file-input" name="arquivos[]" id="validatedCustomFile" required multiple="">
		    <label class="custom-file-label" for="validatedCustomFile">Selecione os arquivos da revista</label>
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
				$descricao = addslashes($_POST['descricao']);
				$arquivos = $_FILES['arquivos'];


				if($u->novaRevista($titulo, $descricao, $arquivos)) {

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