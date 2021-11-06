<main>
	<div class="container">
		<!-- title -->
		<div class="row">
			<div class="col-sm">
				<div class="card mt-3 mb-3">
					<h5 class="card-header text-center">Blog</h5>
				</div>
			</div>
		</div>
		<!-- end title -->
		<!-- linha 1 -->
		<div class="row justify-content-center">
			<!-- Coluna 1 -->
			<div class="col-md-12 col-lg-8">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php

						global $pdo;

						$sql = $pdo->prepare("SELECT * FROM slider ORDER BY id DESC");
						$sql->execute();

						while ($info = $sql->fetch()) {

						?>
						
							<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $info["id"];?>" class="active"></li>

						<?php } ?>
							<!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
						</ol>
						<div class="carousel-inner">
							<?php

							$db = $pdo->prepare("SELECT * FROM slider ORDER BY id DESC");
							$db->execute();
							
							for ($i = 0; $i < $db->rowCount(); $i++) {

							$dados = $db->fetch();

							?>
							<div class="carousel-item <?php if($i == 0) { echo "active";} ?>">
								<img class="d-block w-100" src="public/uploads/<?php echo $dados["image"] ?>" alt="Primeiro Slide">
								<div class="carousel-caption d-none d-md-block">
									<h5><?php echo $dados["titulo"] ?></h5>
									<p><?php echo $dados["texto"] ?></p>
								</div>
							</div>

						<?php 
						
						 } ?>
							
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Próximo</span>
						</a>
					</div> 
					
				</div>
				<!-- end coluna 1 -->

				<!-- coluna 2 -->
				<div class="col-sm">
					<div class="card first-card mt-2" style="width: 100%; height: 97%;">
						<div class="card-body shadow-sm">
							<?php
							global $pdo;
							$sql = $pdo->prepare("SELECT * FROM textocard");
							$sql->execute();
							$dados = $sql->fetch();

							?>
							<h2 class="card-title text-center"><?php echo $dados["titulo"] ?></h2>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $dados["subtitulo"] ?></h6>
							<p class="card-text"><?php echo $dados["texto"] ?></p>
							<a href="#" class="card-link m-1" style="/*position: absolute;*/ top: 90%;">Link do card</a>
							<!-- <a href="#" class="card-link">Outro link</a> -->
						</div>
					</div>
				</div>
				<!-- end coluna 2 -->
		</div>
		<!-- End linha 1 -->

		<!-- Linha 2 -->
		<div class="row">

			<div class="col-sm">
				<div class="card mt-3 mb-3">
					<h5 class="card-header text-center">Últimas Noticias</h5>
				</div>
			</div>
				
		</div>
		<!-- End linha 2 -->

		<!-- linha 3 -->
		<div class="row">
			<div class="col-sm">
				<div class="card-deck card-noticias justify-content-center">

						<?php 

						

					  	global $pdo;
					  	
					  	$sql = $pdo->prepare("SELECT * FROM postagens ORDER BY id DESC");
					  	$sql->execute();

					  	if($sql->rowCount() < 6) {
					  	$n = $sql->rowCount();
					  	for ($i = 0; $i < $n; $i++ ) {
					  		$dados = $sql->fetch();
						?>

						<div class="card m-2 shadow" style="">
							<img class="card-img-top" src="<?php echo 'public/uploads/'.$dados['image'] ?>" alt="Imagem de capa do card">
							<div class="card-body">
								<h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
								<p class="card-text"><?php echo substr($dados['conteudo'], 0, 100); ?></p>
								<a href="noticia/<?php echo $dados['url']; ?>" class="btn btn-primary">Ler Noticia</a>
								<small class="text-muted float-right mt-3"><?php echo $dados['data']; ?></small>
							</div>
						</div>

						<?php

					  	} }else {

					  	// Limite Publicações
					  	for ($i = 0; $i < 6; $i++ ) {
					  		$dados = $sql->fetch();
						?>

						<div class="card m-2 shadow" style="">
							<img class="card-img-top" src="<?php echo 'public/uploads/'.$dados['image'] ?>" alt="Imagem de capa do card">
							<div class="card-body">
								<h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
								<p class="card-text"><?php echo substr($dados['conteudo'], 0, 100); ?></p>
								<a href="noticia/<?php echo $dados['url']; ?>" class="btn btn-primary">Ler Noticia</a>
								<small class="text-muted float-right mt-3"><?php echo $dados['data']; ?></small>
							</div>
						</div>

						<?php
							}
							}

						?>
					</div>
					<!-- end card group -->
				<div class="row">
					<div class="col-sm">
						<div class="card text-center shadow-sm">
							<div class="card-body">
								<a href="noticias/" class="btn btn-success">Ver todas as noticias</a>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div>
		<!-- ende linha 3 -->

		<!-- Linha 4 -->
		<div class="row">

			<div class="col-sm">
				<div class="card mt-3 mb-3">
					<h5 class="card-header text-center">Galeria de Imagens</h5>
				</div>
			</div>
				
		</div>
		<!-- End linha 4 -->

		<!-- Linha 5 -->
		<div class="row">
			<div class="col-sm">
				<div class="card-deck card-albuns justify-content-center">

            <!-- Card -->

            <?php 
            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM galeria");
            $sql->execute();

            while ($dados = $sql->fetch()) {
             
            ?>


          <div class="card mt-2 shadow">
            <div class="card-body">
              <h2 class="card-title text-center"><?php echo $dados['titulo']; ?></h2>
              <p class="card-text"><?php echo $dados['descricao']; ?></p>
            </div>


            <p class="card-text p-2"><small class="text-muted float-right"><?php echo $dados['data']; ?></small></p>


            <div class="card-img-bottom">


              <div id="carouselExampleControls<?php echo $dados['codigo']; ?>" class="carousel slide" data-ride="carousel">


                <div class="carousel-inner">

                  <?php

                      $id = $dados['codigo'];
                      $db = $pdo->prepare("SELECT * FROM imagens WHERE codigo = :id");
                      $db->bindValue(":id", $id);
                      $db->execute();
                      

                      for ($i = 0; $i < 3 ; $i++) {
                        # code...
                        $info = $db->fetch();
                   ?>

                    <div class="carousel-item <?php if($i == 0) { echo "active";} ?>">
                      <img class="d-block w-100" src="public/uploads/galeria/<?php echo $info["nome"] ?>" alt="Primeiro Slide - <?php echo $dados['codigo']; ?>">                 
                    </div>

                      <?php } ?>

                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls<?php echo $dados['codigo']; ?>" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                  <span class="sr-only">Anterior</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleControls<?php echo $dados['codigo']; ?>" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Próximo</span>
                </a>

              </div>
                
            </div>
            
            <div class="" style="margin: 0 auto;">
              <a type="button" href="album/<?php echo $dados['codigo']; ?>" class="btn btn-info m-2"><i class="fa fa-picture-o pr-1"></i> Ver Álbum Completo</a>
            </div>
            
          </div>

          <?php
            }
          ?>
						<!-- End Card -->
				</div>
					<div class="row">
							<div class="col-sm">
									<div class="card text-center shadow-sm mt-3">
										<div class="card-body">
											<a href="galeria/" class="btn btn-success">Ver todos os Álbuns</a>
										</div>
									</div>
							</div>
					</div>
					
			</div>
		</div>
		<!-- End Linha 5 -->

		<!-- Linha 6 -->
		<div class="row">

				<div class="col-sm">
						<div class="card mt-3 mb-3">
							<h5 class="card-header text-center">Revista's</h5>
						</div>
				</div>
				
		</div>
		<!-- End linha 6 -->

		<!-- Linha 7  -->
		<div class="row">
				<!-- coluna 1 -->
				<div class="col-sm">
						<div class="card-deck card-noticias justify-content-center">
							<?php

          
			                  global $pdo;

			                  $sql = $pdo->prepare("SELECT * FROM revista");
			                  
			                  $sql->execute();

			                  while ($dados = $sql->fetch()){

			                   $id = $dados["codigo"];
			                   $db = $pdo->prepare("SELECT * FROM imagens WHERE codigo = $id");
			                   $db->execute();

			                   

			                ?>
							<div class="card m-2 shadow">
								<?php for ($i=0; $i < 1 ; $i++) { $info = $db->fetch(); ?>
								<img class="card-img-top" src="public/uploads/revista/<?php echo $info["nome"]; ?>" alt="Imagem de capa do card">
								<?php } ?>
								<div class="card-body">
									<h5 class="card-title"><?php echo $dados["titulo"] ?></h5>
									<p class="card-text"><?php echo $dados["descricao"] ?></p>
									<p class="card-text"><small class="text-muted">Postado em <?php echo $dados["data"] ?></small></p>
									<a href="revista/<?php echo $dados["codigo"] ?>" type="button" class="btn btn-danger">Visualizar Revista</a>
								</div>
							</div>
						<?php } ?>


						</div>
						<div class="row">
								<div class="col-sm">
										<div class="card text-center shadow-sm mt-2">
											<div class="card-body">
												<a href="#" class="btn btn-success">Ver todas as revistas</a>
											</div>
										</div>
								</div>
						</div>
				</div>
				<!-- end coluna 7 -->
		</div>
		<!-- end linha -->
		<!-- Linha 8 -->
		<div class="row">
				<div class="col-sm">
						<div class="card mt-4 box-total shadow" style="width: 100%;">
							<div class="card-header">
								<h5 class="card-title mb-0">Total de Publicações</h5>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<?php
									$r = $pdo->prepare("SELECT id FROM galeria");
									$r->execute();
									?>
									<span>Galeria</span>
									<a type="button" class="btn btn-success  float-right"><?php echo $r->rowCount(); ?></a>
								</li>
								
								<li class="list-group-item">
									<?php
									$r = $pdo->prepare("SELECT id FROM postagens");
									$r->execute();
									?>
									<span>Noticia</span>
									<a type="button" class="btn btn-success bg-success float-right"><?php echo $r->rowCount(); ?></a>
								</li>

								<li class="list-group-item">
									<?php
									$r = $pdo->prepare("SELECT id FROM revista");
									$r->execute();
									?>
									<span>Revista</span>
									<a type="button" class="btn btn-success  float-right"><?php echo $r->rowCount(); ?></a>
								</li>
							</ul>
						</div>
				</div>
		</div>
		<!-- end linha -->

	</div>
	<!-- End Container -->
</main>