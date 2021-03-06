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
  <link rel="stylesheet" type="text/css" href="<?= assets('css/login.css') ?>">
  <title>Reservas - Login</title>
</head>

<body>
  <?php require __DIR__.'/navbar.php'; ?>

  <div class="container justify-content-center">
    <div class="card">
      <div class="card-body">
        <form action="api/login.php" method="POST" autocomplete="off">
          <div class="form-group">
            <label>Login</label>
            <input class="form-control" type="text" name="login" placeholder="Informe o seu login..." required>
          </div>

          <div class="form-group">
            <label>Senha</label>
            <input class="form-control" type="password" name="senha" placeholder="Informe a sua senha..." required>
          </div>

          <div>
            <button class="btn btn-primary btn-block">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= assets('vendor/js/jquery.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/bootstrap.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/ztoast.min.js') ?>"></script>
  <script src="<?= assets('js/login.js') ?>"></script>
</body>

</html>