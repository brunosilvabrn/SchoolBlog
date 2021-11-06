
<main>
	<div class="box-postagens-noticia">
		<div class="titulo-postagens">
			<h1>Nova Categoria</h1>
		</div>
		<form method="POST">
		  <div class="form-group">
		     <label for="exampleInputEmail1">Nome Da Categoria</label>
   			 <input type="text" class="form-control" id="exampleInputEmail1" name="categoria" required>
		  </div>
		  <br>
		  <div class="btn-1">
		  	<button type="submit" class="btn btn-primary">Criar Categoria</button>
		  </div>
		</form>

		<?php

		if(isset($_POST['categoria']) && !empty($_POST['categoria'])) {
			global $pdo;
			require_once 'public/class/Administrador.php';
			$u = new Administrador();

			$categoria = $_POST['categoria'];

			if($u->novaCategoria($categoria)){

				echo '
						<div class="container mt-4">
							<div class="row">
								<div class="btn btn-success col-md-6 m-auto">
									Categoria criada com sucesso!
								</div>
							</div>
						</div>
					';

			}else {

				echo '
						<div class="container mt-4">
							<div class="row">
								<div class="btn btn-danger col-md-6 m-auto">
									Erro ao criar categoria!
								</div>
							</div>
						</div>
					';


			}

		}

		?>


	</div>
</main>

