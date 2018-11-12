<?php

/**
 * [PT-BR]
 * Cria a View conforme o que for passado pela url
 * incluindo os arquivos estaticos header.php e footer.php
 * adicionando a pagina chamada entre o cabeçalho e rodapé.
 */
class View{
	
	function __construct(){
		
	}

	/**
	 * [PT-BR]
	 * Verifica se a url chamada é igual a uma das urls adicionada na index
	 * Caso seja igual retorna a pagina chamada entre o cabeçalho e rodapé
	 * Caso não seja igual retorna apenas o cabeçalho e o rodapé.
	 * @param String $path = url adicionada na index.php
	 */
	public function addPath(String $path){

		$url = $_SERVER['REQUEST_URI'];		

		if(substr_count($url, $path) > 0 && $url[strlen($url)-1] == $path[strlen($path)-1]){

			$filename = substr($url, (strripos($url, '/') + 1)) . ".php";
			
			$folder = substr($filename,  0, - 4);
			
			$content = "app/views/{$folder}/{$filename}";		
			
			
			if($folder == null){
				
					include 'app/views/header/header.php';
					include 'app/views/footer/footer.php';
				
			}else{
				
					include 'app/views/header/header.php';
					include $content;
					include 'app/views/footer/footer.php';
				
			}
		}
	}
}

?>