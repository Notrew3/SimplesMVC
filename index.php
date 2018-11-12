<?php
require_once('config/config.php');

$html = new View();

$html->addPath('/');

$html->addPath('users');

$html->addPath('profile');

$html->addPath('messages');

?>