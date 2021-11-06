<?php
require_once 'app/connection.php';
require_once 'app/routeControl.php';
$application = new mainRoute();

$application->app();

?>