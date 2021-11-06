<?php

session_start();

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DBNAME', 'blog_teste');

global $pdo;

try {

	$pdo = new PDO("mysql:dbname=".DBNAME."; host=".HOST, USER, PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
	echo "ERROR: ".$e->getMessage();
	exit();
}




?>