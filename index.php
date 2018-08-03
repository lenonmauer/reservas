<?php
require_once __DIR__.'/core/helpers.php';
require_once __DIR__.'/core/session.php';

$session = new Session();

if ($session->userIsLogged()) {
  redirect('reservas.php');
}
else {
  redirect('login.php');
}