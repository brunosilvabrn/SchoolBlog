
<main>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <?php
        $url = $_GET['url'];
        $url = array_filter(explode('/', $url));

        $urlNoticia = $url[1];

        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM postagens WHERE url = :url");
        $sql->bindValue(":url", $urlNoticia);
        $sql->execute();

        $dados = $sql->fetch();

        ?>
        <h1 class="mt-4"><?php echo $dados['titulo']; ?></h1>

        <!-- Author -->
        <p class="lead mb-0">
          Por:
          <small>Clube Jornal da Escola<strong> Ceti Moderna</strong> / Blog <strong>Ceti Moderna</strong></small>
        </p>
        <!-- <p class="lead m-0 font-weight-bold">
          Autor da Postagem:
          <span class="font-italic font-weight-normal">Bruno Lopes Silva</span>
        </p> -->

        <hr>
          <p>Autor da Postagem: <strong><?php echo $dados['autor']; ?></strong></p>
        <hr>

        <!-- Date/Time -->
        <p>Postado em <?php echo $dados['data']; ?> as <?php echo $dados['hora']; ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="public/uploads/<?php echo $dados['image']; ?>" alt="">

        <hr>

        <!-- Subtitulo -->
        <p class="lead font-w-550">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

        <!-- Post Content -->
        <span class="lead font-weight-normal"><?php echo $dados['conteudo']; ?></span>

        
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Comentarios:</h5>
        </div>

  
        <!-- Comment with nested comments -->

        <!-- Plugin Coments Facebook -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v10.0" nonce="g82wuR7o"></script>


        <div class="media mb-4">
          <!-- <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt=""> -->
          <div class="media-body">
            <div class="fb-comments" data-href="http://localhost/blog/noticia/nova-postagem-teste" data-width="100%" data-numposts="5"></div>
           
          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-12 col-lg-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categorias</h5>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <ul class="list-unstyled mb-0">
                  <?php

                  $db = $pdo->prepare("SELECT * FROM categorias");              
                  $db->execute();


                  while ($info = $db->fetch() ) {
                    ?>
                    <li>
                      <a href="noticias/c/<?php echo $info['codigo']; ?>"><?php echo $info['categoria']; ?></a>
                    </li>
                    <?php
                  }

                  ?>
                </ul>
              </div>
      
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</main>