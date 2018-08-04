<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/user_model.php';

$nome_exibicao = @$_POST['nome_exibicao'];
$login = @$_POST['login'];
$senha = @$_POST['senha'];

if (empty($nome_exibicao)) {
  Response::badRequest('Informe o nome de exibição.');
}
else if (empty($senha)) {
  Response::badRequest('Informe a sua senha.');
}
else if (empty($senha)) {
  Response::badRequest('Informe a sua senha.');
}

$senhaMD5 = md5($senha);

$model = new UserModel();

if ($model->loginExists($login)) {
  Response::badRequest('Este login já existe. Informe outro login.');
}

if ($model->createUser($login, $senhaMD5, $nome_exibicao)) {
  Response::success('Usuario criado com sucesso', ['redirectUrl' => 'lista_usuario.php']);
}
else {
  Response::badRequest('Ocorreu um ao tentar criar o usuário.');
}