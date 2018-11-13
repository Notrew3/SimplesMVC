<?php 

/**
 * [PT-BR]
 * Gera o template da view
 */
class Template {

	/**
	 * [PT-BR]
	 * dados para serem exibidos na view
	 * @var array **apenas valores ou arrays de até 2 níveis (Ainda pensando em como suportar arrays de diverssos níveis)
	 */
	private $data = array();
	/**
	 * [PT-BR]
	 * nome do arquivo html
	 * @var string **nome do arquivo com extensao .html
	 */
	private $archive;
	/**
	 * [PT-BR]
	 * pasta onde está o arquivo .html
	 * @var string **nome da pasta
	 */
	private $folder;

	/**
	 * [PT-BR]
	 * seta nome da pasta e nome do arquivo a serem usados para o template
	 * @param string $folder  nome da pasta
	 * @param string $archive nome do arquivo
	 */
	function __construct($folder = '', $archive = '')
	{
		$this->setFolder($folder);
		$this->setArchive($archive);
	}

	/**
	 * [PT-BR]
	 * adiciona cada variavel a ser usada no template (em breve valor sera recebido da MODEL)
	 * @param array $data **um array de variaveis (em breve valores serão recebidos da MODEL)
	 */
	public function setData($data = array()){
		foreach ($data as $key => $value) {
			$this->data[$key] = $value;
		}			
	}

	/**
	 * [PT-BR]
	 * Retorna o array $data com todas variaveis que foram adicionadas pelo metodo setData()
	 * @return array **array de variaveis
	 */
	public function getData(){
		return $this->data;
	}

	/**
	 * [PT-BR]
	 * adiciona o nome do arquivo a ser usado no template
	 * @param string $archive nome do arquivo.html
	 */
	public function setArchive($archive){
		$this->archive = $archive;
	}

	/**
	 * [PT-BR]
	 * retorna o arquivo adicionado pelo metodo setArchive()
	 * @return string **nome do arquivo.html
	 */
	public function getArchive(){
		return $this->archive;
	}

	/**
	 * [PT-BR]
	 * adiciona o nome da pasta onde está o arquivo.html
	 * @param string $folder **nome da pasta
	 */
	public function setFolder($folder){
		$this->folder = $folder;
	}

	/**
	 * [PT-BR]
	 * retorna o nome da pasta adicionado pelo metodo setFolder()
	 * @return string **nome da pasta
	 */
	public function getFolder(){
		return $this->folder;
	}

	/**
	 * [PT-BR]
	 * procura pelo arquivo.html informado dentro da pasta informada e retorna uma
	 * string com o conteudo do arquivo.html
	 * @return string **conteudo do arquivo.html
	 */
	protected function loadArchive(){
		if(file_exists($this->getFolder().DIRECTORY_SEPARATOR.$this->getArchive())){
			$archive = file_get_contents($this->getFolder().DIRECTORY_SEPARATOR.$this->getArchive());
		}else{
			throw new Exception("Loading archive ".$this->getArchive()." Fails");			
		}
		return $archive;
	}	

	/**
	 * [PT-BR]
	 * busca por blocos {$valor} dentro da string retornada pelo metodo loadArchive() e troca pelos
	 * valores das variaveis salvas no array $data. 
	 * @return string **a string com o HTML a ser interpretado pelo browser (em breve este metodo nao usara o echo como saida e sim return para ser usado em outra classe)
	 */
	public function publish(){
		try{
			$archive = $this->loadArchive();
			foreach ($this->getData() as $key => $value) {
				if(is_array($value)){
					foreach ($value as $k => $v) {
						$temp = '{$'.$key.'[\''.$k.'\']}';
						var_dump($temp);
						$archive = str_replace($temp, $v, $archive);
					}					
				}else{			
					$temp = '{$'.$key.'}';
					$archive = str_replace($temp, $value, $archive);
				}										
			}
			var_dump($archive);
			echo $archive;
		}catch(Exception $error){
			echo $error->getMessage();
		}
	}
	
	
}

?>