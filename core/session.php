<?php
session_start();

require_once __DIR__.'./helpers.php';

class Session {
  private $sessionKey = 'user';

  function checkUserLogged() {
    if (!$this->userIsLogged()) {
      redirect('login.php');
    }
  }

  function setUser($user) {
    $_SESSION[$this->sessionKey] = $user;
  }

  function getUser() {
    return $this->userIsLogged() ? $_SESSION[$this->sessionKey] : null;
  }

  function removeUser() {
    unset($_SESSION[$this->sessionKey]);
  }

  function userIsLogged() {
    return isset($_SESSION[$this->sessionKey]) && !empty($_SESSION[$this->sessionKey]['id']);
  }
}
