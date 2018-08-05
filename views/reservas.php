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
  <title>Reservas de Salas</title>
</head>

<body>
  <?php require __DIR__.'/navbar.php'; ?>

  <div class="container justify-content-center">
    <div class="card col-md-10 offset-md-1">
      <div class="card-body">
        <h5 class="card-title">Reserva de Salas de Reunião</h5>

        <br><br>

        <form action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Selecione a sala de reunião</label>
                <select name="sala_id" class="form-control" required>
                  <option value="">Selecione...</option>
                  <?php
                    foreach($salas as $sala) {
                      $selected = $sala['id'] == $selectedSalaId ? 'selected' : '';
                    ?>
                      <option value="<?=$sala['id']?>" <?=$selected?>>
                        <?=$sala['descricao']?>
                      </option>
                  <?php
                    } ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Selecione a data</label>
                <input class="form-control" type="text" name="data" placeholder="Informe o data..." value="<?=$selectedDate?>" required>
              </div>
            </div>

            <div class="col-md-2">
              <label style="visibility: hidden;">&nbsp;a</label>
              <button class="btn btn-primary btn-block">Verificar</button>
            </div>
          </div>
        </form>

        <?php
          if ($showReservasTable) { ?>
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-dark">
                <tr>
                  <th>Horário</th>
                  <th>Disponibilidade</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  foreach($listaHorarios as $horario) {
                    $data_reserva = $selectedDateISO.' '.$horario['hora_inicial'];
                  ?>
                    <tr>
                      <td><?=$horario['hora_inicial'] . ' - ' . $horario['hora_final']?></td>
                      <td>
                        <?= $horario['hasReservante'] ? 'Ocupado por: '.$horario['nomeReservante'] : 'Disponível'; ?>
                      </td>
                      <td class="text-right">
                        <?php
                          if($horario['hasReservante'] == false) { ?>
                            <a href="<?= url('api/cad_reserva.php', ['sala_id' => $selectedSalaId, 'data_reserva' => $data_reserva]) ?>" class="btn btn-success btn-xs btn-acao">
                              Reservar
                            </a>
                        <?php
                          } else if ($horario['souProprietario']) { ?>
                            <a href="<?= url('api/rem_reserva.php', ['id' => $horario['reservaId']]) ?>" class="btn btn-danger btn-xs btn-remove btn-acao">
                              Cancelar Reserva
                            </a>
                        <?php
                          } ?>
                      </td>
                    </tr>
                <?php
                  } ?>
              </tbody>
            </table>
        <?php
          } ?>

      </div>
    </div>
  </div>

  <script src="<?= assets('vendor/js/jquery.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/bootstrap.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/ztoast.min.js') ?>"></script>
  <script src="<?= assets('vendor/js/jquery.maskedinput.min.js') ?>"></script>
  <script src="<?= assets('js/reservas.js') ?>"></script>
</body>

</html>