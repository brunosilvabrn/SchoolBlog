<?php

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = array_filter(explode('/', $url));

if(!isset($url[2])) {

	echo "<script>window.location.href='administrador/galeria'</script>";

}

$id = $url[2];

require_once 'app/connection.php';

global $pdo;

$sql = $pdo->prepare("SELECT * FROM galeria WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

while($valor = $sql->fetch()){
	echo '
		<main>
			<div class="msg-excluir">
				<h1>Deseja Realmente Excluir Essa Revista?</h1>
				<label><span>TITULO:</span> '.$valor['titulo'].'</label>
				<br>
				<label><span>TEXTO:</span> '.$valor['descricao'].'</label>
				<div class="btn-excluir">
					<a class="btn btn-outline-success" href="administrador/excluir-galeria/'.$valor['id'].'/deletar" role="button">SIM</a>
					<a class="btn btn-outline-danger" href="administrador/galeria" role="button">NÃO</a>
				</div>
			</div>

			'
			;

			if(isset($url[3]) && $url[3] == 'deletar' && isset($url[2])) {


				$id = $url[2];

				$sql = $pdo->prepare("DELETE FROM galeria WHERE id = :id");
				$sql->bindValue(":id", $id);
				$sql->execute();

				if($sql->rowCount() > 0) {
				
					echo "<script>window.location.href='administrador/galeria'</script>";
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
