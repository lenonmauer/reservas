<?php
require_once __DIR__.' /../core/session.php';

$session = new Session();
$userIsLogged = $session->userIsLogged();
$user = $session->getUser();
?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Sistema de Reservas</a>
  <?php
    if ($userIsLogged) { ?>
      <span class="navbar-text">
        Logado como: <?= $user['nome_exibicao'] ?>
      </span>
  <?php
    } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuários
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= url('cad_usuario.php') ?>">Cadastro</a>
          <a class="dropdown-item" href="<?= url('lista_usuario.php') ?>">Lista</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Salas
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= url('cad_sala.php') ?>">Cadastro</a>
          <a class="dropdown-item" href="<?= url('lista_sala.php') ?>">Lista</a>
        </div>
      </li>
    <?php
    if ($userIsLogged) { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reservas
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= url('reservas.php') ?>">Cadastro</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= url('logout.php') ?>">Deslogar</a>
      </li>
    <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= url('login.php') ?>">Logar</a>
        </li>
        <?php
      } ?>

    </ul>
  </div>
</nav>