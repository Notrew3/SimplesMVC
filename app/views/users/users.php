<?php

$users = new Usuario();

$users_data = $users->getData();



?>
<h1>
An example getting data from DB
</h1>
<hr>
<table border="1">
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>E-mail</th>
		<th>Password</th>
	</thead>
	<tbody>
		<?php foreach ($users_data as $user) { ?>
			<tr>
				<td><?= $user['id'] ?></td>
				<td><?= $user['name'] ?></td>
				<td><?= $user['email'] ?></td>
				<td><?= $user['password'] ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
