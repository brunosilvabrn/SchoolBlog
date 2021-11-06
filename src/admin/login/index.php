<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include_once 'app/base.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Entrar | Sistema</title>
</head>
<body>
    <div class="l-form">
        <form method="POST"  class="form">
           
            <h1 class="form__title">Entrar</h1>

            <div class="form__div">
                <input type="text" name="usuario" class="form__input" placeholder=" ">
                <label for="" class="form__label">Usuario</label>
            </div>

            <div class="form__div">
                <input type="password" name="senha" class="form__input" placeholder=" ">
                <label for="" class="form__label">Senha</label>
            </div>

            <input type="submit" class="form__button" value="Entrar">

            <?php

            if(isset($_POST["usuario"]) && isset($_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"])) {


                require_once 'app/connection.php';
                require_once 'app/administrador.php';
         
                $adm = new administrador();
                
                $user = addslashes($_POST["usuario"]);
                $pass = addslashes($_POST["senha"]);


                if($adm->logar($user, $pass) == true) {
                 
                    header("location: administrador");
                    
                } elseif ($adm->logar($user, $pass) == false) {
                    
                    echo '
                        <div class="alert">
                            <p>Senha incorreta!</p>
                        </div>';
                

                } 


            }

            ?>
        </form>
    </div>
</body>
</html>