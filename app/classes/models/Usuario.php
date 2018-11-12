<?php
require_once('./config/config.php');

/**
 * [PT-BR]
 * Modelo que faz a comunicação com o banco de dados
 */
class Usuario
{

	/**
	 * [PT-BR]
	 * Nome da tabela do banco de dados ao qual se refere o modelo
	 * @var string
	 */
	private $table = 'users';

	/**
	 * [PT-BR]
	 * Classe que retorna todos os dados da tabela $table
	 * @return [array] [array assoc com o nome os campos da tabela do banco como indice]
	 */
	public function getData(){

		$conn = Connection::getInstance();
		$sql = "SELECT * FROM $this->table";
		$stm = $conn->prepare($sql);
		$stm->execute();
		$users = $stm->fetchAll(PDO::FETCH_ASSOC);

		return $users;

	}
}

?>