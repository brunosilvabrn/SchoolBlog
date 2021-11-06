<?php
// Criar tabela banco de dados
// Configurar Formulario 
global $pdo;
$sql = $pdo->prepare("SELECT * FROM textocard");
$sql->execute();

while($dado = $sql->fetch()) {

	?>
		<main>
			
			<div class="box-postagens-noticia">
				<div class="titulo-postagens">
					<h1>Texto inicial Blog</h1>
				</div>
				<form method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Titulo</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" maxlength="255" name="titulo" required="" rows="2"><?php echo $dado["titulo"]?></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">subtitulo *opicional</label>
				    <input class="form-control" name="subtitulo" value="<?php echo $dado['subtitulo'] ?>" maxlength="255"></input>
				  </div>
				  <div class="form-group margin-1">
				    <label for="exampleFormControlTextarea1">Texto</label>
				    <textarea class="form-control" id='editor1' name="texto" required="" maxlength="667" rows="3"><?php echo $dado["texto"] ?></textarea>
				  </div>		  
				  
				  <br>

				  <script type="text/javascript">
				  	function notificacao() {
				  		alert("É nessario atualiazar a pagina para vizualizar as novas informações");
				  	}
				  </script>
				  
				  <div class="btn-1 mt-4">
				  	<button type="submit" class="btn btn-primary" onclick="notificacao()" name="conf">Editar</button>
				  </div>
				</form>
			</div>
		</main>

	<?php

	if(isset($_POST["titulo"])) {

		if(isset($_POST['texto'])) {

			require_once 'public/class/Administrador.php';
			$u = new Administrador();
			$titulo = addslashes($_POST['titulo']);
			$subtitulo = addslashes($_POST['subtitulo']);
			$texto = addslashes($_POST['texto']);

			if($u->insertTextoCard($titulo, $subtitulo, $texto)) {

				echo '
					<div class="container mt-4">
						<div class="row">
							<div class="btn btn-success col-md-6 m-auto">
								Editado com sucesso!
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
