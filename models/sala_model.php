<?php
require_once __DIR__.'/../core/database.php';

class SalaModel {
  private $database;

  function __construct () {
    $this->database = new Database();
  }

  /* Cria uma nova sala */
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

  /* Altera uma sala */
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

  /* Remove uma sala */
  function removeSala($removeSalaId) {
    $sql = 'DELETE FROM salas WHERE id=?';
    $bindParams = [
      'i', $removeSalaId,
    ];

    $this->database->connect();
    $result = $this->database->delete($sql, $bindParams);
    $this->database->close();

    return $result;
  }

  /* Verifica se a sala existe, utilizando a descrição como referencia */
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

  /* Retorna a sala de um determinado id */
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

  /* Retorna todas as salas */
  function getSalas() {
    $sql = 'SELECT * FROM salas';

    $this->database->connect();
    $result = $this->database->select($sql);
    $this->database->close();

    return $result;
  }
}