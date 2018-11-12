<?php

/*  
  * [PT-BR]
  * Constantes de parâmetros para configuração da conexão  
  */  
 define('HOST', 'localhost');  
 define('DBNAME', 'testing_db');  
 define('CHARSET', 'utf8');  
 define('USER', 'root');  
 define('PASSWORD', '');
	
/*
* Funcao que faz o autoload das classes para nao ter que usar require.
*/
spl_autoload_register(function ($nomeClasse){
	$folders = scandir('./app/classes');	
	unset($folders[0]);
	unset($folders[1]);
	
	if (file_exists($nomeClasse.".php") === true) {
		require_once($nomeClasse.".php");
	}else{
		foreach ($folders as $folder) {
			if(file_exists("app" .DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $nomeClasse.".php") === true){
				require_once("app" .DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $nomeClasse.".php");
			}
		}
	}
});

/**
 * [PT-BR]
 * Função que adiciona os arquivos .css de cada view
 * @return [string] [tag html <link>]
 */
function loadCss(){
	$pastas = scandir('./app/views');	
	foreach ($pastas as $path) {
		if($path != '.' || $path != '..'){
			$folder = glob("./app/views/$path/*.{css}", GLOB_BRACE);
    	foreach ($folder as $filename) {
        echo "<link rel='stylesheet' type='text/css' href='$filename'>\n";
    	}
		}
	}
}

?>