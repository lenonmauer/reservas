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
$salaId = @$_GET['sala_id'];
$dataHorarioReserva = @$_GET['data_reserva'];
$userId = $loggedUser['id'];

if (empty($salaId)) {
  Response::badRequest('Informe a sala da reserva.');
}
else if (empty($dataHorarioReserva)) {
  Response::badRequest('Informe a data e horário da reserva.');
}
else if ($model->isUserDisponivelOnDate($userId, $dataHorarioReserva) === false) {
  Response::badRequest('Você já possui uma sala reservada nesta mesma data e horário.');
}
else if ($model->isSalaDisponivelOnDate($salaId, $dataHorarioReserva) === false) {
  Response::badRequest('Esta sala já está reservada nesta data e horário.');
}

if ($model->createReserva($userId, $salaId, $dataHorarioReserva)) {
  Response::success('Sala reservada com sucesso.');
}
else {
  Response::badRequest('Ocorreu um erro ao tentar reservar esta sala.');
}