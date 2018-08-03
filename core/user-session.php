<?php
session_start();

class UserSession {
  private $sessionKey = 'user';

  function checkUserLogged() {
    if (!$this->userIsLogged()) {
      $this->redirectToLoginPage();
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

  private function redirectToLoginPage() {
    header('Location: login.php');
    die();
  }
}
