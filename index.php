<?php
require_once('config/config.php');

/*
Teste da classe View (que em breve será reestruturada)
$html = new View();

$html->addPath('/');

$html->addPath('users');

$html->addPath('profile');

$html->addPath('messages');
*/

//Teste da classe Template
$arr = array(
	'nome' => 'Ewerton',
	'sobrenome' => 'Azevedo',
	'endereco' => array(
									'rua' => 'Rua 1',
									'numero' => 32
								),
	'contato' => array(
									'telefone' => '1111-2222',
									'email' => 'ewerton@email.com'
								)
);

$tpl = new Template('app/templates', 'index.html');
$tpl->setData($arr);
$tpl->publish();



?>