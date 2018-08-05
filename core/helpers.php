<?php
require_once __DIR__.'/../config.php';

/* Gera uma URL com parâmetros utilizando a BASE_URL da aplicação */
function url($path, $params = []) {
  $url = BASE_URL.'/'.$path;

  if (!empty($params)) {
    $querystring = http_build_query($params);
    $url.= '?'.$querystring;
  }

  return $url;
}

/* Gera uma para a pasta assets */
function assets($path) {
  return ASSETS_URL.'/'.$path;
}

/* Redireciona para um script */
function redirect($path) {
  header('Location: '.url($path));
  die();
}