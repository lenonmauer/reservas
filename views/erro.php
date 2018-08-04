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
  <link rel="stylesheet" type="text/css" href="<?= assets('css/erro.css') ?>">
  <title>Erro</title>
</head>

<body>
  <?php require __DIR__.'/navbar.php'; ?>

  <div class="container justify-content-center">
    <div id="card-cadastro" class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $erro ?></h5>
      </div>
    </div>
  </div>

  <script src="<?= assets('vendor/js/jquery.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/bootstrap.min.js') ?>"></script>
</body>

</html>