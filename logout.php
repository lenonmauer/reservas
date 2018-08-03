<?php
require __DIR__.'/core/helpers.php';
require __DIR__.'/core/session.php';

$session = new Session();
$session->removeUser();

redirect('login.php');
?>