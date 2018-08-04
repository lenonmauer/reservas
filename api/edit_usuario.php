<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/user_model.php';

$model = new UserModel();

$nome_exibicao = @$_POST['nome_exibicao'];
$login = @$_POST['login'];
$senha = @$_POST['senha'];
$idUpdate = @$_GET['id'];

$usuarioNaoExiste = empty($idUpdate) || $model->getUserById($idUpdate) === null;

if (empty($nome_exibicao)) {
  Response::badRequest('Informe o nome de exibição.');
}
else if (empty($senha)) {
  Response::badRequest('Informe a sua senha.');
}
else if (empty($senha)) {
  Response::badRequest('Informe a sua senha.');
}
else if ($usuarioNaoExiste) {
  Response::badRequest('Usuário da edição não encontrado.');
}

if ($model->loginExists($login, $idUpdate)) {
  Response::badRequest('Este login já existe. Informe outro login.');
}

$senhaMD5 = md5($senha);

if ($model->updateUser($idUpdate, $login, $senhaMD5, $nome_exibicao)) {
  Response::success('Usuario alterado com sucesso', ['redirectUrl' => 'lista_usuario.php']);
}
else {
  Response::badRequest('Ocorreu um ao tentar alterar o usuário.');
}
