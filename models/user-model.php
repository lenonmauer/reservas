<?php
require_once __DIR__.'/../core/database.php';

class UserModel {
  private $database;

  function __construct () {
    $this->database = new Database();
  }

  function loginUser($login, $senha) {
    $sql = 'SELECT * FROM usuarios WHERE login = ? and senha = ?';
    $bindParams = [
      'ss', $login, $senha,
    ];

    $this->database->connect();
    $result = $this->database->select($sql, $bindParams);
    $this->database->close();

    return count($result) ? $result[0] : false;
  }

  function loginExists($login) {
    $sql = 'SELECT COUNT(*) FROM usuarios WHERE login = ?';
    $bindParams = [
      's', $login,
    ];

    $this->database->connect();
    $result = $this->database->count($sql, $bindParams);
    $this->database->close();

    return $result === 1;
  }
}