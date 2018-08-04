<?php
require_once __DIR__.'/../core/database.php';

class UserModel {
  private $database;

  function __construct () {
    $this->database = new Database();
  }

  function createUser($login, $senhaMD5, $nome_exibicao) {
    $sql = 'INSERT INTO usuarios (login, senha, nome_exibicao) VALUES (?, ?, ?)';
    $bindParams = [
      'sss', $login, $senhaMD5, $nome_exibicao,
    ];

    $this->database->connect();
    $result = $this->database->insert($sql, $bindParams);
    $this->database->close();

    return $result > 0;
  }

  function updateUser($updateUserId, $login, $senhaMD5, $nome_exibicao) {
    $sql = 'UPDATE usuarios SET login=?, senha=?, nome_exibicao=? WHERE id=?';
    $bindParams = [
      'sssi', $login, $senhaMD5, $nome_exibicao, $updateUserId,
    ];

    $this->database->connect();
    $result = $this->database->update($sql, $bindParams);
    $this->database->close();

    return $result;
  }

  function removeUser($removeUserId) {
    $sql = 'DELETE FROM usuarios WHERE id=?';
    $bindParams = [
      'i', $removeUserId,
    ];

    $this->database->connect();
    $result = $this->database->delete($sql, $bindParams);
    $this->database->close();

    return $result;
  }

  function loginUser($login, $senhaMD5) {
    $sql = 'SELECT * FROM usuarios WHERE login = ? and senha = ?';
    $bindParams = [
      'ss', $login, $senhaMD5,
    ];

    $this->database->connect();
    $result = $this->database->select($sql, $bindParams);
    $this->database->close();

    return count($result) ? $result[0] : false;
  }

  function loginExists($login, $ignoreUserId = null) {
    $sql = 'SELECT COUNT(*) FROM usuarios WHERE login = ?';

    if ($ignoreUserId !== null) {
      $sql.= ' AND id <> ?';

      $bindParams = [
        'si', $login, $ignoreUserId,
      ];
    }
    else {
      $bindParams = [
        's', $login,
      ];
    }

    $this->database->connect();
    $result = $this->database->count($sql, $bindParams);
    $this->database->close();

    return $result >= 1;
  }

  function getUserById($id) {
    $sql = 'SELECT * FROM usuarios WHERE id = ?';
    $bindParams = [
      'i', $id,
    ];

    $this->database->connect();
    $result = $this->database->select($sql, $bindParams);
    $this->database->close();

    return count($result) ? $result[0] : null;
  }


  function getUsers() {
    $sql = 'SELECT * FROM usuarios';

    $this->database->connect();
    $result = $this->database->select($sql);
    $this->database->close();

    return $result;
  }
}