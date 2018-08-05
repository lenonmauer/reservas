<?php
require_once __DIR__.'/../core/database.php';

class ReservaModel {
  private $database;

  function __construct () {
    $this->database = new Database();
  }

  function createReserva($userId, $salaId, $dataHorarioReserva) {
    $sql = 'INSERT INTO reservas (usuario_id, sala_id, data_inicio) VALUES (?, ?, ?)';
    $bindParams = [
      'iis', $userId, $salaId, $dataHorarioReserva,
    ];

    $this->database->connect();
    $result = $this->database->insert($sql, $bindParams);
    $this->database->close();

    return $result > 0;
  }

  function getReservas($sala_id, $date) {
    $sql = 'SELECT r.*, u.nome_exibicao as usuario_nome
      FROM reservas as r
      JOIN usuarios as u ON u.id = r.usuario_id
      WHERE sala_id=? and DATE(data_inicio)=?';


    $bindParams = [
      'is', $sala_id, $date,
    ];

    $this->database->connect();
    $result = $this->database->select($sql, $bindParams);
    $this->database->close();

    return $result;
  }

  function isUserDisponivelOnDate($userId, $dataHorarioReserva) {
    $sql = 'SELECT COUNT(*) FROM reservas WHERE usuario_id = ? AND data_inicio = ?';

    $bindParams = [
      'is', $userId, $dataHorarioReserva,
    ];

    $this->database->connect();
    $result = $this->database->count($sql, $bindParams);
    $this->database->close();

    return $result == 0;
  }

  function isSalaDisponivelOnDate($salaId, $dataHorarioReserva) {
    $sql = 'SELECT COUNT(*) FROM reservas WHERE sala_id = ? AND data_inicio = ?';

    $bindParams = [
      'is', $salaId, $dataHorarioReserva,
    ];

    $this->database->connect();
    $result = $this->database->count($sql, $bindParams);
    $this->database->close();

    return $result == 0;
  }

  function isUserProprietarioReserva($reservaId, $userId) {
    return true;
  }

  function removeReserva($reservaId) {
    $sql = 'DELETE FROM reservas WHERE id=?';
    $bindParams = [
      'i', $reservaId,
    ];

    $this->database->connect();
    $result = $this->database->delete($sql, $bindParams);
    $this->database->close();

    return $result;
  }
}