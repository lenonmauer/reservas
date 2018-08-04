<?php
require_once __DIR__.'/../core/database.php';

class SalaModel {
  private $database;

  function __construct () {
    $this->database = new Database();
  }

  function createSala($descricao) {
    $sql = 'INSERT INTO salas (descricao) VALUES (?)';
    $bindParams = [
      's', $descricao,
    ];

    $this->database->connect();
    $result = $this->database->insert($sql, $bindParams);
    $this->database->close();

    return $result > 0;
  }

  function updateSala($updateSalaId, $descricao) {
    $sql = 'UPDATE salas SET descricao=? WHERE id=?';
    $bindParams = [
      'si', $descricao, $updateSalaId,
    ];

    $this->database->connect();
    $result = $this->database->update($sql, $bindParams);
    $this->database->close();

    return $result;
  }

  function salaExists($descricao, $ignoreSalaId = null) {
    $sql = 'SELECT COUNT(*) FROM salas WHERE descricao = ?';

    if ($ignoreSalaId !== null) {
      $sql.= ' AND id <> ?';

      $bindParams = [
        'si', $descricao, $ignoreSalaId,
      ];
    }
    else {
      $bindParams = [
        's', $descricao,
      ];
    }

    $this->database->connect();
    $result = $this->database->count($sql, $bindParams);
    $this->database->close();

    return $result >= 1;
  }

  function getSalaById($id) {
    $sql = 'SELECT * FROM salas WHERE id = ?';
    $bindParams = [
      'i', $id,
    ];

    $this->database->connect();
    $result = $this->database->select($sql, $bindParams);
    $this->database->close();

    return count($result) ? $result[0] : null;
  }
}