<?php

class mainRoute {

	public function app() {
		
		$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
		$url = array_filter(explode('/', $url));

		$file = "src/blog/".$url[0].".php";

		if($url[0] == 'administrador') {

			require_once 'app/dashboard.php';

			die();

		}elseif (!is_file($file)) {

			require_once 'src/blog/head.php';

			require_once 'src/blog/navbar.php';

			require_once 'src/blog/404.php';

			require_once 'src/blog/bottom.php';

			die();
		}

		require_once 'src/blog/head.php';

		require_once 'src/blog/navbar.php';

		require_once $file;

		require_once 'src/blog/footer.php';

		require_once 'src/blog/bottom.php';

	}

	public function dashboard() {

		$url = (isset($_GET['url'])) ? $_GET['url'] : 'dados';
		$url = array_filter(explode('/', $url));

		$page = (isset($url[1])) ? $url[1] : 'dados';

		$file = "src/admin/".$page.".php";

		require_once 'src/admin/head.php';

		require_once 'src/admin/navbar.php';

		if(is_file($file)) {

			require_once $file;

		}else {

			require_once 'src/admin/dados.php';

		}

		require_once 'src/admin/bottom.php';

	}

	public function login() {

		require_once 'src/admin/login/index.php';

	}

}

?>