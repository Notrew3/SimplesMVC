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
$arr[0]['user'] = array(

							
								'nome' => 'Ewerton',
								'sobrenome' => 'Azevedo',
								'endereco' => array(
																'rua' => 'Rua 1',
																'numero' => 32
															),
								'contato' => array(
																'telefone' => '1111-2222',
																'email' => 'ewerton@email.com',
																'redes' => array(
																							'facebook' => 'fb.com/ewerton',
																							'twitter' => 'tw.com/eweron',
																							'instagran' => 'insta.com/ewerton',
																							'testes' => array(
																														'primeiro' => 'sou o primeiro',
																														'segundo' => 'sou o segundo haha'
																													)
																					 )
															)						
					
				);

$arr[1]['user'] = array(

							
								'nome' => 'Rhuan',
								'sobrenome' => 'TudoSocial',
								'endereco' => array(
																'rua' => 'Rua TudoSocial',
																'numero' => 232
															),
								'contato' => array(
																'telefone' => '3333-2322',
																'email' => 'Rhuan@email.com',
																'redes' => array(
																							'facebook' => 'fb.com/Rhuan',
																							'twitter' => 'tw.com/Rhuan',
																							'instagran' => 'insta.com/Rhuan',
																							'testes' => array(
																														'primeiro' => 'Sou o chefe',
																														'segundo' => 'sou o secretario haha'
																													)
																					 )
															)						
					
				);


echo "<pre>";
print_r($arr);
echo "</pre>";

$tpl = new Template('app/templates', 'index.html');
$tpl->setData($arr);
$tpl->publish();



?>