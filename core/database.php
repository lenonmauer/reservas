<?php

class Database {
  private $host;
  private $user;
  private $password;
  private $database;
  private $connection;

  function __construct ($host = '127.0.0.1', $user = 'root', $password = '', $database = '') {
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
  }

  function connect() {
    $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);

    if (!$this->connection) {
      echo "Erroo: " . mysqli_connect_errno() . ' - ' . mysqli_connect_error();
      exit;
    }
  }
}
