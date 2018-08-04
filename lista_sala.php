<?php
require __DIR__.'/models/sala_model.php';

$model = new SalaModel();
$salas = $model->getSalas();

if (empty($salas)) {
  $erro = 'Nenhuma sala encontrada.';
  require __DIR__.'/views/erro.php';
  exit;
}

require __DIR__.'/views/lista_sala.php';