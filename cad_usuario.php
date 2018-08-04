<?php
require __DIR__.'/models/user_model.php';

$idToUpdate = @$_GET['id'];

if (!empty($idToUpdate)) {
  $model = new UserModel();
  $user = $model->getUserById($idToUpdate);

  if (empty($user)) {
    $erro = 'Usuario não encontrado';
    require __DIR__.'/views/erro.php';
    exit;
  }
}

$hasUserToUpdate = isset($user);

$urlFormulario = $hasUserToUpdate ? 'api/edit_usuario.php?id='.$idToUpdate : 'api/cad_usuario.php';

require __DIR__.'/views/cad_usuario.php';