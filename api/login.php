<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../core/session.php';
require_once __DIR__.'/../models/user_model.php';

$login = @$_POST['login'];
$senha = @$_POST['senha'];

if (empty($login)) {
  Response::badRequest('Informe o seu login.');
}
else if (empty($senha)) {
  Response::badRequest('Informe a sua senha.');
}

$senhaMD5 = md5($senha);

$model = new UserModel();
$session = new Session();

if ($user = $model->loginUser($login, $senhaMD5)) {
  $session->setUser($user);
  Response::success('Login efetuado com sucesso', ['redirectUrl' => 'reservas.php']);
}
else {
  Response::badRequest('Login ou senha incorretos.');
}