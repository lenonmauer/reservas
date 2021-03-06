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
  <title>Lista de Usuários</title>
</head>

<body>
  <?php require __DIR__.'/navbar.php'; ?>

  <div class="container justify-content-center">
    <div class="card col-md-10 offset-md-1">
      <div class="card-body">
        <h5 class="card-title">Lista de Usuários</h5>

        <br><br>

        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Login</th>
              <th>&nbsp;</th>
            </tr>
          </thead>

          <tbody>
            <?php
              foreach($users as $user) { ?>
                <tr>
                  <td><?=$user['id']?></td>
                  <td><?=$user['nome_exibicao']?></td>
                  <td><?=$user['login']?></td>
                  <td class="text-right">
                    <a href="<?= url('cad_usuario.php', ['id' => $user['id']]) ?>" class="btn btn-success btn-xs">
                      Editar
                    </a>
                    <a href="<?= url('api/rem_usuario.php', ['id' => $user['id']]) ?>" class="btn btn-danger btn-xs btn-remove">
                      Remover
                    </a>
                  </td>
                </tr>
            <?php
              } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="<?= assets('vendor/js/jquery.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/bootstrap.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/ztoast.min.js') ?>"></script>
  <script src="<?= assets('js/lista_usuario.js') ?>"></script>
</body>

</html>