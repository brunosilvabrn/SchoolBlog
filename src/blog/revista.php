   
    <!-- Main -->
    <main>
        <div class="container">
            <!-- Linha 2 -->
            <div class="row">

                <div class="col-sm">
                    <div class="card mt-3 mb-3">
                    <?php
                        $url = $_GET['url'];
                        $url = array_filter(explode('/', $url));

                        $id = $url[1];

                        global $pdo;

                        $sql = $pdo->prepare("SELECT * FROM revista WHERE codigo = :codigo");
                        $sql->bindValue(":codigo", $id);
                        $sql->execute();
                        $dados = $sql->fetch();

                    ?>
                      <div class="card-header text-center">
                        <h3 class=""><?php echo $dados["titulo"]; ?></h3>
                        <span class="mb-0"><?php echo $dados["descricao"]; ?></span>
                      </div>
                    </div>
                
                 </div>

            <div class="row justify-content-center">
                <?php
                $codigo = $dados["codigo"];
                $db = $pdo->prepare("SELECT * FROM imagens WHERE codigo = :codigo");
                $db->bindValue(":codigo", $codigo);
                $db->execute();

                while ($info = $db->fetch()) {
                    # code...
                ?>
              <div class="col-lg-10 mb-3" style="padding: 0px 0px 0px 28px !important;">
                <img class="img-fluid" src="public/uploads/revista/<?php echo $info["nome"] ?>">
              </div>
          <?php } ?>
    
            </div>
        
    
    <!-- End Linha 5 -->
        </div>
        <!-- End Container -->
    </main>
    <!-- End Main -->