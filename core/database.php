<?php
require_once __DIR__.'/../config.php';

class Database
{
  private $connection;

  public function connect()
  {
    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$this->connection) {
      $message = mysqli_connect_errno() . ' - ' . mysqli_connect_error();
      throw new Exception($message);
      exit;
    }
  }

  public function insert($sql, $bindParams = [])
  {
    if (!$this->connection) {
      throw new Exception('Sem conexão com o banco de dados para fazer o insert');
    }

    $query = $this->connection->prepare($sql);

    if ($query) {
      if (!empty($bindParams)) {
        call_user_func_array(array($query, 'bind_param'), $this->refValues($bindParams));
      }

      if ($query->execute()) {
        return $this->connection->insert_id;
      }
      else {
        throw new Exception($this->connection->error);
      }
    }
    else {
      throw new Exception($this->connection->error);
    }
  }

  public function select($sql, $bindParams = [])
  {
    if (!$this->connection) {
      throw new Exception('Sem conexão com o banco de dados para fazer o select');
    }

    $query = $this->connection->prepare($sql);

    if ($query) {
      if (!empty($bindParams)) {
        call_user_func_array(array($query, 'bind_param'), $this->refValues($bindParams));
      }

      if ($query->execute()) {
        $data = [];
        $result = $query->get_result();

        while ($row = $result->fetch_assoc()) {
          $data[] = $row;
        }

        return $data;
      }
      else {
        throw new Exception($this->connection->error);
      }
    }
    else {
      throw new Exception($this->connection->error);
    }
  }

  public function count($sql, $bindParams = [])
  {
    if (!$this->connection) {
      throw new Exception('Sem conexão com o banco de dados para fazer o select');
    }

    $query = $this->connection->prepare($sql);

    if ($query) {
      if (!empty($bindParams)) {
        call_user_func_array(array($query, 'bind_param'), $this->refValues($bindParams));
      }

      if ($query->execute()) {
        $result = $query->get_result();
        $rowsCount = $result->fetch_row();
        return intval($rowsCount[0]);
      }
      else {
        throw new Exception($this->connection->error);
      }
    }
    else {
      throw new Exception($this->connection->error);
    }
  }

  public function update($sql, $bindParams = [])
  {
    if (!$this->connection) {
      throw new Exception('Sem conexão com o banco de dados para fazer o update');
    }

    $query = $this->connection->prepare($sql);

    if ($query) {
      if (!empty($bindParams)) {
        call_user_func_array(array($query, 'bind_param'), $this->refValues($bindParams));
      }

      if ($query->execute()) {
        return true;
      }
      else {
        throw new Exception($this->connection->error);
      }
    }
    else {
      throw new Exception($this->connection->error);
    }
  }

  public function delete($sql)
  {
    if (!$this->connection) {
      throw new Exception('Sem conexão com o banco de dados para fazer o delete');
    }
    $query = $this->connection->prepare($sql);

    if ($query) {
      if (!empty($bindParams)) {
        call_user_func_array(array($query, 'bind_param'), $this->refValues($bindParams));
      }

      if ($query->execute()) {
        return true;
      }
      else {
        throw new Exception($this->connection->error);
      }
    }
    else {
      throw new Exception($this->connection->error);
    }
  }

  public function close()
  {
    if ($this->connection) {
      $this->connection->close();
    }
  }

  private function refValues($arr)
  {
    $refs = array();

    foreach ($arr as $key => $value) {
      $refs[$key] = &$arr[$key];
    }

    return $refs;
  }
}
