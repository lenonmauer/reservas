<?php
session_start();

require_once __DIR__.'./helpers.php';

class Session {
  const SESSION_KEY = 'user';

  /* Verifica se o usuário está logado. Se não estiver, redireciona para a página de login */
  function checkUserLogged() {
    if (!$this->userIsLogged()) {
      redirect('login.php');
    }
  }

  /* Altera o usuário da sessão atual */
  function setUser($user) {
    $_SESSION[self::SESSION_KEY] = $user;
  }

  /* Retorna o usuário da sessão atual */
  function getUser() {
    return $this->userIsLogged() ? $_SESSION[self::SESSION_KEY] : null;
  }

   /* Remove o usuário da sessão atual */
  function removeUser() {
    unset($_SESSION[self::SESSION_KEY]);
  }

  /* Verifica se o usuário está logado */
  function userIsLogged() {
    return isset($_SESSION[self::SESSION_KEY]) && !empty($_SESSION[self::SESSION_KEY]['id']);
  }
}
