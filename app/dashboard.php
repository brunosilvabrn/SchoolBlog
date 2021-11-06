<?php

require_once 'app/connection.php';
require_once 'app/routeControl.php';

$app = new mainRoute();

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {

	$app->dashboard();

} else {

	$app->login();

}



?>