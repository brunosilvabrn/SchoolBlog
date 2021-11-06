   
    <!-- Main -->
    <main>
        <div class="container">
            <!-- Linha 2 -->
            <div class="row">

                <div class="col-sm">
                    <div class="card mt-3 mb-3">
                      <h5 class="card-header text-center">Albuns de Imagens</h5>
                    </div>
                </div>
                
            </div>
            <!-- End linha 2 -->

              <div class="row mb-2">
      <div class="col-sm">
        <div class="card-deck card-albuns justify-content-center">

            <!-- Card -->

            <?php 
            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM galeria");
            $sql->execute();

            while ($dados = $sql->fetch()) {
              # code...
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
              <a href="album/<?php echo $dados['codigo']; ?>" type="button" class="btn btn-info m-2"><i class="fa fa-picture-o pr-1"></i> Ver Álbum Completo</a>
            </div>
           
          </div>

          <?php
            }
          ?>

          </div>
            <!-- End Card -->
        </div>
      
      </div>
    </div>
    <!-- End Linha 5 -->
        </div>
        <!-- End Container -->
    </main>
    <!-- End Main -->