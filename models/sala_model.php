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

  function salaExists($descricao) {
    $sql = 'SELECT COUNT(*) FROM salas WHERE descricao = ?';
    $bindParams = [
      's', $descricao,
    ];

    $this->database->connect();
    $result = $this->database->count($sql, $bindParams);
    $this->database->close();

    return $result >= 1;
  }
}