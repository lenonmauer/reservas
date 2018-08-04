<?php
require_once __DIR__.'/../core/helpers.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="<?= assets('vendor/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= assets('css/global.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= assets('css/cad_sala.css') ?>">
  <title>Cadastro de Salas de Reunião</title>
</head>

<body>
  <?php require __DIR__.'/navbar.php'; ?>

  <div class="container justify-content-center">
    <div id="card-cadastro" class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar Sala</h5>

        <form action="api/cad_sala.php" method="POST" autocomplete="off">
          <div class="form-group">
            <label>Descrição da Sala</label>
            <input class="form-control" type="text" name="descricao" placeholder="Informe a descrição da sala..." required>
          </div>

          <div>
            <button class="btn btn-primary btn-block">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= assets('vendor/js/jquery.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/bootstrap.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/ztoast.min.js') ?>"></script>
  <script src="<?= assets('js/cad_sala.js') ?>"></script>
</body>

</html>