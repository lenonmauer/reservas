<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/user_model.php';

$model = new UserModel();
$idRemove = @$_GET['id'];
$usuarioNaoExiste = empty($idRemove) || $model->getUserById($idRemove) === null;

if ($usuarioNaoExiste) {
  Response::badRequest('Usuário da edição não encontrado.');
}

if ($model->removeUser($idRemove)) {
  Response::success('Usuario removido com sucesso');
}
else {
  Response::badRequest('Ocorreu um ao tentar remover o usuário.');
}
