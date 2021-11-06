
<main>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">

                <?php

                $url = $_GET['url'];
                $url = array_filter(explode('/', $url));

                $url = $url[1];

                global $pdo;

                $sql = $pdo->prepare("SELECT * FROM galeria WHERE codigo = :codigo");
                $sql->bindValue(":codigo", $url);
                $sql->execute();

                $dados = $sql->fetch();

                ?>

                <h1 class="page-title text-center"><?php echo $dados["titulo"]; ?></h1>
                <span class="text-center" style="font-size: 20px;"><?php echo $dados["descricao"]; ?></span>
                <hr>
                <small class="text-muted">Data: <?php echo $dados["data"]; ?></small>
                <hr>
              
                <div class="row">
                    <?php

                    $idImg = $dados["codigo"];

                    $db = $pdo->prepare("SELECT * FROM imagens WHERE codigo = :codio");
                    $db->bindValue(":codio", $idImg);
                    $db->execute();

                    while ($info = $db->fetch()) {

                    ?>
                    <a href="public/uploads/galeria/<?php echo $info["nome"] ?>"  target="_blank" data-toggle="lightbox" data-gallery="example-gallery" class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <img src="public/uploads/galeria/<?php echo $info["nome"] ?>" class="img-fluid card shadow-sm shadow-album-img">
                    </a>

                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>