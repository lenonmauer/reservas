<?php
require __DIR__.'/models/user_model.php';

$model = new UserModel();
$users = $model->getUsers();

if (empty($users)) {
  $erro = 'Nenhum usuário encontrado.';
  require __DIR__.'/views/erro.php';
  exit;
}

require __DIR__.'/views/lista_usuario.php';