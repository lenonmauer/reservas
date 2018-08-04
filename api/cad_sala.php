<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/sala_model.php';

$descricao = @$_POST['descricao'];

if (empty($descricao)) {
  Response::badRequest('Informe a descrição da sala.');
}

$model = new SalaModel();

if ($model->salaExists($descricao)) {
  Response::badRequest('Já existe uma sala com essa descrição. Informe outra.');
}

if ($model->createSala($descricao)) {
  Response::success('Sala criada com sucesso', ['redirectUrl' => 'lista_sala.php']);
}
else {
  Response::badRequest('Ocorreu um erro ao tentar criar a sala.');
}