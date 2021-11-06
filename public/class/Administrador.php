<?php 


Class Administrador {

	public function UploadPostagem($titulo, $subtitulo, $autor, $image, $conteudo, $categoria) {

		global $pdo;

		require_once 'app/connection.php';

		$url = $this->RemoverAcentos($titulo);
		$img = $this->uploadImagem($image);
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$subtitulo = $subtitulo;
		$autor = filter_var($autor, FILTER_SANITIZE_SPECIAL_CHARS);
		$conteudo = $conteudo;
		$categoria = addslashes($categoria);
		$data = $this->data();
		$hora = $this->hora();

		$sql = $pdo->prepare("INSERT INTO postagens (url , titulo, subtitulo, autor, image, conteudo, data, hora, categoria) VALUES (:url, :titulo, :subtitulo, :autor, :image, :conteudo, :data, :hora, :categoria)");
		$sql->bindValue(":url", $url);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":subtitulo", $subtitulo);
		$sql->bindValue(":autor", $autor);
		$sql->bindValue(":image", $img);
		$sql->bindValue(":conteudo", $conteudo);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":hora", $hora);
		$sql->bindValue(":categoria", $categoria);
		$sql->execute();

		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

	public function uploadImagem($anexo){

		global $pdo;

		require_once 'app/connection.php';

		$caminho = 'public/uploads/';

		if(count($anexo) > 0){
			$controle = count($anexo['tmp_name']);
			for($i = 0; $i < $controle; $i++){
				$type = $anexo['type'][$i];
				$tmpname = $anexo['tmp_name'][$i];

				if($type == 'image/jpeg'){

					$gerarnome = md5(time().rand(0, 9999)).'.jpg';
					
					if(move_uploaded_file($tmpname, $caminho.$gerarnome)){

						list($largura_atual, $altura_atual) = getimagesize($caminho.$gerarnome);

						$largura_nova = 1280;
						
						$fator = $altura_atual/$largura_atual;
						$altura_nova = $largura_nova * $fator;

						$img = imagecreatetruecolor($largura_nova, $altura_nova);
						$original = imagecreatefromjpeg($caminho.$gerarnome);
						imagecopyresampled($img, $original, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_atual, $altura_atual);
						imagejpeg($img, $caminho.$gerarnome, 80);

						require_once 'app/connection.php';

						$sql = $pdo->prepare("INSERT INTO imagens (nome) VALUES (:nome)");
						$sql->bindValue(":nome", $gerarnome);
						$sql->execute();

					}

				}elseif($type == 'image/png') {

					$gerarnome = md5(time().rand(0, 9999)).'.png';
					
					if(move_uploaded_file($tmpname, $caminho.$gerarnome)){

						list($largura_atual, $altura_atual) = getimagesize($caminho.$gerarnome);

						$largura_nova = 1280;
						
						$fator = $altura_atual/$largura_atual;
						$altura_nova = $largura_nova * $fator;

						
						$img = imagecreatetruecolor($largura_nova, $altura_nova);
						$original = imagecreatefrompng($caminho.$gerarnome);
						imagecopyresampled($img, $original, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_atual, $altura_atual);
						imagepng($img, $caminho.$gerarnome);

						require_once 'app/connection.php';

						$sql = $pdo->prepare("INSERT INTO imagens (nome) VALUES (:nome)");
						$sql->bindValue(":nome", $gerarnome);
						$sql->execute();
					}
				}

			}
			
			return $gerarnome;
		}
	}

	public function data(){

		date_default_timezone_set('America/Sao_Paulo');

		$data = date('d/m/Y');

		return $data;
	}

	public function hora(){

		date_default_timezone_set('America/Sao_Paulo');

	
		$hora = date('H:i');

		return $hora;
	}


	// Função para remoção de qualquer tipo de acentuação e retirada de caracteres especiais para criação de urls amigaveis

	public function RemoverAcentos($string, $slug = false) {

		// Caracteres a serem mantidos so que decodificados
		$table = array(
		'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'Ž'=>'Z', '.'=>'',
		'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
		'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
		'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
		'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
		'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
		'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
		'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
		'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
		'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
		'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
		'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
		'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
		'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
		'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', ' '=>'-', '$'=>'s',
		'!'=>'i', '@'=>'a', '#'=>'h', '%'=>'o', '¨'=>'o',
		'&'=>'e', '*'=>'x', '('=>'-', ')'=>'-', '§'=>'e',
		'ª'=>'a', 'º'=>'o', '='=>'e', '/'=>'-', ','=>'',
		);

		// Traduz os caracteres em $string, baseado no vetor $table
		$string = strtr($string, $table);

		// Converte para minúsculo
		$string = strtolower($string);

		// Remove caracteres indesejáveis (que não estão no padrão)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);

		// Remove múltiplas ocorrências de hífens ou espaços
		// $string = preg_replace("/[\s-]+/", " ", $string);

		// Faz a retirada de espaços multiplos no texto para evitar que a url fique com mais de uma hifen entre os espaçamentos
		$string = trim($string);

		// Transforma espaços e underscores em $slug
		$string = preg_replace("/[\s_]/", $slug, $string);

		// retorna a string
		return $string;
	}

	public function novaCategoria($nome) {

		// require_once 'app/connection.php';
		global $pdo;

		$nomeCategoria = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
		$Codcategoria = $this->RemoverAcentos($nome);

		$sql = $pdo->prepare("INSERT INTO categorias (codigo, categoria) VALUES (:codigo, :categoria)");
		$sql->bindValue(":codigo", $Codcategoria);
		$sql->bindValue(":categoria", $nomeCategoria);
		$sql->execute();

		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}


	}

	public function novaGaleria($titulo, $descricao, $imagens) {

		global $pdo;

		set_time_limit(0);
		
		$tituloCategoria = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$desc = $descricao = $descricao;
		$img = $imagens;
		$codigo = mt_rand(10000, 99999);
		$data = $this->data();

		$sql = $pdo->prepare("INSERT INTO galeria (codigo, titulo, descricao, data) VALUES (:codigo, :titulo, :descricao, :data)");
		$sql->bindValue(":codigo", $codigo);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":data", $data);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			if ($this->uploadImagensGaleria($imagens, $codigo)) {
				return true;
			}	
		}
	}

	public function novaRevista($titulo, $descricao, $imagens) {

		global $pdo;
		
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$desc = $descricao;
		$img = $imagens;
		$codigo = mt_rand(10000, 99999);
		$data = $this->data();

		$sql = $pdo->prepare("INSERT INTO revista (codigo, titulo, descricao, data) VALUES (:codigo, :titulo, :descricao, :data)");
		$sql->bindValue(":codigo", $codigo);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $desc);
		$sql->bindValue(":data", $data);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			if ($this->uploadImagensRevista($imagens, $codigo)) {
				return true;
			}	
		}
	}

	public function uploadImagensRevista($anexo, $codigo) {
		$imagem = $anexo;
		// Caminho onde vai ser realizado upload das imagens
		$caminho = "public/uploads/revista/";
		$controle = count($imagem['tmp_name']);
		$uploads = array();
	
		for ($i = 0; $i < $controle ; $i++) { 
			
			$type = $imagem['type'][$i];
			$tempName = $imagem['tmp_name'][$i];

			if ($type == 'image/jpeg' || $type == 'image/png') {

				if ($type == 'image/jpeg') {

					$novoNome = $this->gerarNome().'.jpeg';

				}elseif ($type == 'image/png') {

					$novoNome = $this->gerarNome().'.png';

				}

				if (move_uploaded_file($tempName, $caminho.$novoNome)) {
					
					list($largura_atual, $altura_atual) = getimagesize($caminho.$novoNome);

					$largura_nova = 1280;

					$fator = $altura_atual / $largura_atual;
					$altura_nova = $largura_nova * $fator;

					$img = imagecreatetruecolor($largura_nova, $altura_nova);

					if ($type == 'image/jpeg') {

						$original = imagecreatefromjpeg($caminho.$novoNome);
						imagecopyresampled($img, $original, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_atual, $altura_atual);
						imagejpeg($img, $caminho.$novoNome, 80);

					}elseif ($type == 'image/png') {

						$original = imagecreatefrompng($caminho.$novoNome);
						imagecopyresampled($img, $original, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_atual, $altura_atual);
						imagepng($img, $caminho.$novoNome);
					}

					$this->insertImagemDb($novoNome, $codigo);

					array_push($uploads, $novoNome);
				}

			} else {
				$nome = $imagem['name'][$i];
				$descricao = "Erro upload arquivo incompativel. Arquivo : ".$nome." | tipo: ".$type;
				array_push($uploads, $descricao);
			}

		}

		return $uploads;

	}

	public function uploadImagensGaleria($anexo, $codigo) {
		set_time_limit(0);
		$imagem = $anexo;
		// Caminho onde vai ser realizado upload das imagens
		$caminho = "public/uploads/galeria/";
		$controle = count($imagem['tmp_name']);
		$uploads = array();
	
		for ($i = 0; $i < $controle ; $i++) { 
			
			$type = $imagem['type'][$i];
			$tempName = $imagem['tmp_name'][$i];

			if ($type == 'image/jpeg' || $type == 'image/png') {

				if ($type == 'image/jpeg') {

					$novoNome = $this->gerarNome().'.jpeg';

				}elseif ($type == 'image/png') {

					$novoNome = $this->gerarNome().'.png';

				}

				if (move_uploaded_file($tempName, $caminho.$novoNome)) {
					
					list($largura_atual, $altura_atual) = getimagesize($caminho.$novoNome);

					$largura_nova = 1280;

					$fator = $altura_atual / $largura_atual;
					$altura_nova = $largura_nova * $fator;

					$img = imagecreatetruecolor($largura_nova, $altura_nova);

					if ($type == 'image/jpeg') {

						$original = imagecreatefromjpeg($caminho.$novoNome);
						imagecopyresampled($img, $original, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_atual, $altura_atual);
						imagejpeg($img, $caminho.$novoNome, 80);

					}elseif ($type == 'image/png') {

						$original = imagecreatefrompng($caminho.$novoNome);
						imagecopyresampled($img, $original, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_atual, $altura_atual);
						imagepng($img, $caminho.$novoNome);
					}

					$this->insertImagemDb($novoNome, $codigo);

					array_push($uploads, $novoNome);
				}

			} else {
				$nome = $imagem['name'][$i];
				$descricao = "Erro upload arquivo incompativel. Arquivo : ".$nome." | tipo: ".$type;
				array_push($uploads, $descricao);
			}

		}

		return $uploads;

	}

	private function insertImagemDb($name, $codigo) {
		global $pdo;
		$sql = $pdo->prepare("INSERT INTO imagens (codigo, nome) VALUES (:codigo, :nome)");
		$sql->bindValue(":codigo", $codigo);
		$sql->bindValue(":nome", $name);
		$sql->execute();

	}

	private function gerarNome() {

		date_default_timezone_set("America/Sao_Paulo");

		$num = mt_rand(100000000, 999999999);
		$data = date("d-m-Y-H-i-s-");
		$nome = $data.$num;
		
		return $nome;
	}

	public function UpdatePostagem($id, $titulo, $subtitulo, $autor, $image, $conteudo, $categoria) {

		global $pdo;

		require_once 'app/connection.php';

		$url = $this->RemoverAcentos($titulo);
		
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$subtitulo = $subtitulo;
		$conteudo = $conteudo;
		$categoria = addslashes($categoria);
		$data = $this->data();
		$hora = $this->hora();

		if(empty($image["name"][0])) {

			$sql = $pdo->prepare("UPDATE postagens SET url = :url, titulo = :titulo, subtitulo = :subtitulo, autor = :autor, conteudo = :conteudo, data = :data, hora = :hora, categoria = :categoria WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->bindValue(":url", $url);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":subtitulo", $subtitulo);
			$sql->bindValue(":autor", $autor);
			$sql->bindValue(":conteudo", $conteudo);
			$sql->bindValue(":data", $data);
			$sql->bindValue(":hora", $hora);
			$sql->bindValue(":categoria", $categoria);
			$sql->execute();
			
		}else {

			$img = $this->uploadImagem($image);
	
			$sql = $pdo->prepare("UPDATE postagens SET url = :url, titulo = :titulo, image = :image, conteudo = :conteudo, data = :data, hora = :hora, categoria = :categoria WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->bindValue(":url", $url);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":image", $img);	
			$sql->bindValue(":conteudo", $conteudo);
			$sql->bindValue(":data", $data);
			$sql->bindValue(":hora", $hora);
			$sql->bindValue(":categoria", $categoria);
			$sql->execute();

		}

		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

	public function insertTextoCard($titulo, $subtitulo, $texto) {

		global $pdo;

		require_once 'app/connection.php';
		
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$subtitulo = filter_var($subtitulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$texto = $texto;
		
	

		$sql = $pdo->prepare("UPDATE textocard SET titulo = :titulo, subtitulo = :subtitulo, texto = :texto");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":subtitulo", $subtitulo);
		$sql->bindValue(":texto", $texto);
		$sql->execute();


		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

	public function upSlider($titulo, $texto, $image) {

		global $pdo;

		// require_once 'app/connection.php';

		// $url = $this->RemoverAcentos($titulo);
		$image = $this->uploadImagem($image);
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$texto = filter_var($texto, FILTER_SANITIZE_SPECIAL_CHARS);

		$sql = $pdo->prepare("INSERT INTO slider (titulo, texto,  image) VALUES (:titulo, :texto, :image)");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":texto", $texto);
		$sql->bindValue(":image", $image);
		$sql->execute();

		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

	public function updateSlider($id, $titulo, $texto, $image) {

		global $pdo;

		
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$texto = filter_var($texto, FILTER_SANITIZE_SPECIAL_CHARS);

		if(empty($image["name"][0])) {

			$sql = $pdo->prepare("UPDATE slider SET titulo = :titulo, texto = :texto WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":texto", $texto);
			$sql->execute();
			
		}else {

			$img = $this->uploadImagem($image);
	
			$sql = $pdo->prepare("UPDATE slider SET titulo = :titulo, texto = :texto, image = :image WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":texto", $texto);
			$sql->bindValue(":image", $img);	
			$sql->execute();

		}

		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

	public function updateRevista($id, $titulo, $descricao) {

		global $pdo;

		
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$descricao = $descricao;
		
		$sql = $pdo->prepare("UPDATE revista SET titulo = :titulo, descricao = :descricao WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);
		$sql->execute();
	
		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

	public function updateGaleria($id, $titulo, $descricao) {

		global $pdo;

		
		$titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
		$descricao = $descricao;
		
		$sql = $pdo->prepare("UPDATE galeria SET titulo = :titulo, descricao = :descricao WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);
		$sql->execute();
	
		if($sql->rowCount() > 0) {

			return true;

		}else {

			return false;

		}

	}

}

?>

