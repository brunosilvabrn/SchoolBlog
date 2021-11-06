   
    <!-- Main -->
    <main>
        <div class="container">
            <!-- title -->
            <div class="row">
                <div class="col-sm">
                    <div class="card mt-3 mb-3">
                        <div class="card-header">
                          <!-- <h5 class="text-center">Blog</h5> -->

                        <div class="dropdown ml-3">
                          <a class="btn btn-md btn-warning dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecionar Categoria
                          </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <h6 class="dropdown-header">Selecione um filtro para as noticias.</h6>
                            <?php
                            global $pdo;
                              $db = $pdo->prepare("SELECT * FROM categorias");
                              $db->execute();

                              while ($cate = $db->fetch()) {
                           
                            ?>
                            <a class="dropdown-item" href="noticias/c/<?php echo $cate['codigo'] ?>"><?php echo $cate['categoria']; ?></a>
                            <!-- <a class="dropdown-item" href="#">Categoria 2</a>
                            <a class="dropdown-item" href="#">Categoria 3</a> -->
                            <?php
                              }
                            ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="noticias/">Todas as Noticias</a>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- end title -->

            <?php

            function loadTitle() {
              global $pdo;
              $url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
              $url = array_filter(explode('/', $url));

              if (empty($url[1])) {
                echo "Todas as Noticias";

              }elseif ($url[1] == 'c' && !empty($url[2]) ) {

                  $parametro = $url[2];

                  $db = $pdo->prepare("SELECT * FROM categorias WHERE codigo = :categoria");
                  $db->bindValue(":categoria", $parametro);
                  $db->execute();

                  if ($db->rowCount() < 1) {
                    echo "Todas as Noticias";
                  }else {
                    $dado = $db->fetch();
                    echo $dado['categoria'];
                  }
                }
            }
            

            ?>

            <!-- Linha 2 -->
            <div class="row">

                <div class="col-sm">
                    <div class="card mt-3 mb-3">
                      <h5 class="card-header text-center"><?php loadTitle() ?></h5>
                    </div>
                </div>
                
            </div>
            <!-- End linha 2 -->

            <!-- linha 3 -->
            <div class="row">
                <div class="col-sm">
                    <div class="card-deck card-noticias-principal justify-content-center">

                      <?php 

                        require_once 'app/pagination.php';

                        ?>
                
                </div>
                
            </div>
            <!-- ende linha 3 -->
        </div>
        <!-- End Container -->
    </main>
    <!-- End Main -->