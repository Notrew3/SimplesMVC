
<?php
$arr = array(
	'users' => array( 
		array(
			'nome' => 'Ewerton',
			'idade' => 28
		),
		array(
			'nome' => 'Rhuan',
			'idade' => 28
		)
	)
);

$arrr = 'users' => array( array(
													'nome' => 'Ewerton',
													'idade' => 28
												),
													array(
													'nome' => 'Rhuan',
													'idade' => 28
												)
										);

var_dump($arrr);
$archive = 
'<h1>Todos os Usuarios</h1>
{loop=$user}
<div>
	<h2>{$nome} {$sobrenome}</h2>
	<p>E-mail: {$contato["email"]}</p>
	<p>Facebook: {$redes["facebook"]}</p>
</div>
{/loop}
<div>
	conteudo do rodapé por exemplo
</div>';

$slice1 = explode('{loop=$user}', $archive);
$slice2 = explode('{/loop}', $slice1[1]);
$loop = $slice2[0];

echo $loop;
?>
