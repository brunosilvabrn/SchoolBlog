<?php

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = array_filter(explode('/', $url));

if(!isset($url[2])) {

	// header("location: admin/postagem");
	echo "<script>window.location.href='administrador/postagens'</script>";

}

$id = $url[2];

require_once 'app/connection.php';

global $pdo;

$sql = $pdo->prepare("SELECT * FROM postagens WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

while($valor = $sql->fetch()){
	echo '
		<main>
			<div class="msg-excluir">
				<h1>Deseja Realmente Excluir Essa Postagem?</h1>
				<label><span>TITULO:</span> '.$valor['titulo'].'</label>
				<br>
				<label><span>DATA:</span> '.$valor['data'].'</label>
				<div class="btn-excluir">
					<a class="btn btn-outline-success" href="administrador/excluir-postagem/'.$valor['id'].'/deletar" role="button">SIM</a>
					<a class="btn btn-outline-danger" href="#" role="button">NÃO</a>
				</div>
			</div>

			'
			;

			if(isset($url[3]) && $url[3] == 'deletar' && isset($url[2])) {

				require_once 'app/connection.php';

				$id = $url[2];

				$sql = $pdo->prepare("DELETE FROM postagens WHERE id = :id");
				$sql->bindValue(":id", $id);
				$sql->execute();

				if($sql->rowCount() > 0) {
				
					echo "<script>window.location.href='administrador/postagens'</script>";
				}else{
					echo '
			
						<div class="container mt-4">
							<div class="row">
								<div class="btn btn-danger col-md-6 m-auto">
									Erro ao deletar!
								</div>
							</div>
						</div>
						
					';

				}
			}


			'


		</main>

	';
}

?>
