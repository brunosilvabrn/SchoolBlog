<?php

global $pdo;

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = array_filter(explode('/', $url));

if(!isset($url[2])){
	echo "<script>window.location.href='admin/postagens'</script>";
}

$id = $url[2];


$sql = $pdo->prepare("SELECT * FROM postagens WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() < 1){
	echo "<script>window.location.href='admin/postagens?msg=nao-encontrado'</script>";
}

while($dado = $sql->fetch()) {

	?>
		<main>
			<script>
				function funcao1()
				{
					alert("A IMAGEM SERÁ EXCLUIDA AUTOMATICAMENTE AO SELECIONAR UMA NOVA IMAGEM, CASO CONTRARIO A MESMA SERÁ MANTIDA. ( A IMAGEM SÓ SERA MOSTRADA NO PREVIEW AO EDITAR A PUBLICAÇÃO! )");
				}
				</script>
			<div class="box-postagens-noticia">
				<div class="titulo-postagens">
					<h1>Editar Noticia</h1>
				</div>
				<form method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Titulo</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="titulo" rows="2"><?php echo $dado["titulo"] ?></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">subtitulo</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="subtitulo" rows="2"><?php echo $dado["subtitulo"] ?></textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Autor</label>
				    <input class="form-control" name="autor" value="<?php echo $dado['autor'] ?>" maxlength="255" required></input>
				  </div>
				  <div class="form-group margin-1">
				    <label for="exampleFormControlTextarea1">Conteudo *(não é necessário alterar as tags que estão entre < >)</label>
				    <textarea class="form-control" id='editor1' name="conteudo" rows="3"><?php echo $dado["conteudo"] ?></textarea>
				  </div>		  
				  <div class="custom-file file-img">
				    <input type="file" class="custom-file-input" onclick="funcao1()" name="image[]" id="validatedCustomFile">
				    <label class="custom-file-label" for="validatedCustomFile">Adicionar Nova Imagem...</label>
				    <div class="invalid-feedback">Example invalid custom file feedback</div>
				  </div>
				  <br>
				  <div class="excluir-img-galeria">
				  	<label for="exampleFormControlTextarea1">Imagem preview</label>
				  	<div class="card" style="width: 95%;">

					  <img src="public/uploads/<?php echo $dado["image"] ?>" class="card-img-top" alt="...">
					  <div class="card-body">
					    <input type="button" class="btn btn-outline-danger" onclick="funcao1()" value="EXCLUIR" />
					  </div>
					</div>
					<div class="col-12">
				  <div class="form-group margin-1">
				  	<select class="custom-select" name="categoria" required>
				      <option value="<?php echo $dado["categoria"] ?>"><?php echo $dado["categoria"] ?></option>
				  	<?php
				      	require_once 'app/connection.php';

				      	$sql = $pdo->prepare("SELECT * FROM categorias");
				      	$sql->execute();
				      	while ($opcoes = $sql->fetch()) {
				      		echo '<option value='.$opcoes['codigo'].'>'.$opcoes['categoria'].'</option>';
				      	} 
				     ?>
				    </select> 
				    </div>
				    <div class="invalid-feedback">Example invalid custom select feedback</div>
				  </div>
				  <div class="btn-1 mt-4">
				  	<button type="submit" class="btn btn-primary" name="conf">Editar</button>
				  </div>
				</form>
			</div>
		</main>

	<?php

	if(isset($_POST["titulo"])) {

		if(isset($_POST['conteudo'])) {

			require_once 'public/class/Administrador.php';
			$u = new Administrador();
			$id = $url[2];
			$titulo = addslashes($_POST['titulo']);
			$subtitulo = addslashes($_POST['subtitulo']);
			$autor = addslashes($_POST['autor']);
			$imagem = (!empty($_FILES['image'])) ? $_FILES['image'] : "vazio";
			$conteudo = $_POST['conteudo'];
			$categoria = addslashes($_POST['categoria']);

			if($u->UpdatePostagem($id, $titulo, $subtitulo, $autor, $imagem, $conteudo, $categoria)) {

				echo '
					<div class="container mt-4">
						<div class="row">
							<div class="btn btn-success col-md-6 m-auto">
								Postagem editada com sucesso!
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
