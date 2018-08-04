<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/sala_model.php';

$model = new SalaModel();
$idRemove = @$_GET['id'];
$salaNaoExiste = empty($idRemove) || $model->getSalaById($idRemove) === null;

if ($salaNaoExiste) {
  Response::badRequest('Sala não encontrada.');
}

if ($model->removeSala($idRemove)) {
  Response::success('Sala removida com sucesso.');
}
else {
  Response::badRequest('Ocorreu um ao tentar remover a sala.');
}
