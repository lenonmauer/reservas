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
  <link rel="stylesheet" type="text/css" href="<?= assets('css/cad_usuario.css') ?>">
  <title>Cadastro de Usuários</title>
</head>

<body>
  <?php require __DIR__.'/navbar.php'; ?>

  <div class="container justify-content-center">
    <div id="card-cadastro" class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar Usuário</h5>

        <form action="api/cad_usuario.php" method="POST" autocomplete="off">
          <div class="form-group">
            <label>Nome de Exibição</label>
            <input class="form-control" type="text" name="nome_exibicao" placeholder="Informe o nome de exibição..." required>
          </div>

          <div class="form-group">
            <label>Login</label>
            <input class="form-control" type="text" name="login" placeholder="Informe o login..." required>
          </div>

          <div class="form-group">
            <label>Senha</label>
            <input class="form-control" type="password" name="senha" placeholder="Informe a senha..." required>
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
  <script src="<?= assets('js/cad_usuario.js') ?>"></script>
</body>

</html>