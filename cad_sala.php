<?php
require __DIR__.'/models/sala_model.php';

$idToUpdate = @$_GET['id'];

if (!empty($idToUpdate)) {
  $model = new SalaModel();
  $sala = $model->getSalaById($idToUpdate);

  if (empty($sala)) {
    $erro = 'Sala não encontrada';
    require __DIR__.'/views/erro.php';
    exit;
  }
}

$hasSalaToUpdate = isset($sala);

$urlFormulario = $hasSalaToUpdate ? 'api/edit_sala.php?id='.$idToUpdate : 'api/cad_sala.php';

require __DIR__.'/views/cad_sala.php';