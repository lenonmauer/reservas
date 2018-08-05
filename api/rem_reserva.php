<?php
require_once __DIR__.'/../core/helpers.php';
require_once __DIR__.'/../core/response.php';
require_once __DIR__.'/../models/reserva_model.php';
require_once __DIR__.'/../core/session.php';

$model = new ReservaModel();
$session = new Session();

if ($session->userIsLogged() === false) {
  Response::badRequest('É necessário estar logado para eta ação.');
}

$loggedUser = $session->getUser();
$reservaId = @$_GET['id'];
$userId = $loggedUser['id'];

if (empty($reservaId)) {
  Response::badRequest('Informe a reserva.');
}

if ($model->isUserProprietarioReserva($reservaId, $userId) === false) {
  Response::badRequest('Não é possível cancelar reservas que não foram feitas por você.');
}

if ($model->removeReserva($reservaId)) {
  Response::success('Reservada cancelada com sucesso.');
}
else {
  Response::badRequest('Ocorreu um erro ao tentar cancelar esta reserva.');
}