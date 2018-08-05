<?php
require __DIR__.'/models/user_model.php';
require __DIR__.'/models/sala_model.php';
require __DIR__.'/models/reserva_model.php';
require __DIR__.'/core/session.php';

$session = new Session();
$session->checkUserLogged();

$userModel = new UserModel();
$salaModel = new SalaModel();
$reservasModel = new ReservaModel();

$loggedUser = $session->getUser();
$users = $userModel->getUsers();
$salas = $salaModel->getSalas();

if (empty($users)) {
  $erro = 'É necessário inserir usuários para reservas salas.';
  require __DIR__.'/views/erro.php';
  exit;
}

if (empty($salas)) {
  $erro = 'É necessário inserir salas para reservas salas.';
  require __DIR__.'/views/erro.php';
  exit;
}

$currentDate = date('d/m/Y');
$selectedSalaId = @$_GET['sala_id'];
$selectedDate = !empty($_GET['data']) ? $_GET['data'] : $currentDate;
$selectedDateISO = date('Y-m-d', strtotime($selectedDate));

if (strtotime($selectedDate) < strtotime($currentDate)) {
  $erro = 'Não é possível efetuar uma reserva em uma data inferior à data atual.';
  require __DIR__.'/views/erro.php';
  exit;
}

/* Gera um array com horários de 00:00 até 23:00 */
for($i=0, $listaHorarios=[]; $i<24; $i++) {
  $hora_i = str_pad($i, 2, '0', STR_PAD_LEFT);
  $hora_f = str_pad($i+1, 2, '0', STR_PAD_LEFT);

  if ($hora_f == '24') {
    $hora_f = '00';
  }

  $horario_inicial = $hora_i.':00';
  $horario_final = $hora_f.':00';

  $listaHorarios[$horario_inicial] = [
    'hora_inicial' => $horario_inicial,
    'hora_final' => $horario_final,
    'hasReservante' => false,
    'nomeReservante' => null,
    'souProprietario' => false,
    'reservaId' => false,
  ];
}

$reservas = $reservasModel->getReservas($selectedSalaId, $selectedDateISO);
$hasReservasOnDate = !empty($reservas);
$showReservasTable = !empty($selectedSalaId);

if ($showReservasTable && $hasReservasOnDate) {
  foreach($reservas as $index => $reserva) {
    $horaInicio = date('H:i', strtotime($reserva['data_inicio']));

    if (isset($listaHorarios[$horaInicio])) {
      $listaHorarios[$horaInicio]['nomeReservante'] = $reserva['usuario_nome'];
      $listaHorarios[$horaInicio]['hasReservante'] = true;
      $listaHorarios[$horaInicio]['souProprietario'] = $loggedUser['id'] == $reserva['usuario_id'];
      $listaHorarios[$horaInicio]['reservaId'] = $reserva['id'];
    }
  }
}

require __DIR__.'/views/reservas.php';