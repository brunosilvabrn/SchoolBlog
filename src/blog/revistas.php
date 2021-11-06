   
    <!-- Main -->
    <main>
        <div class="container">
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
                  <a href="revista/<?php echo $dados["codigo"] ?>" style="color: #000;" type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Visualizar Revista</a>
                </div>
              </div>
            <?php } ?>

             
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card text-center shadow-sm mt-2">
                      <div class="card-body">
                        <a href="#" class="btn btn-success">Ver mais revistas</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end coluna 7 -->
    </div>
          
      </div>
    </div>
    <!-- End Linha 5 -->
        </div>
        <!-- End Container -->
    </main>
    <!-- End Main -->