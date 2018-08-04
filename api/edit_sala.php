<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/sala_model.php';

$model = new SalaModel();

$descricao = @$_POST['descricao'];
$idUpdate = @$_GET['id'];

$salaNaoExiste = empty($idUpdate) || $model->getSalaById($idUpdate) === null;

if (empty($descricao)) {
  Response::badRequest('Informe a descrição da sala.');
}
else if ($salaNaoExiste) {
  Response::badRequest('Sala da edição não encontrada.');
}

if ($model->salaExists($descricao, $idUpdate)) {
  Response::badRequest('Esta sala já existe. Informe outra descrição.');
}

if ($model->updateSala($idUpdate, $descricao)) {
  Response::success('Sala alterada com sucesso.', ['redirectUrl' => 'lista_sala.php']);
}
else {
  Response::badRequest('Ocorreu um ao tentar alterar a sala.');
}
