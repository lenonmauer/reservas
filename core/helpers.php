<?php
require_once __DIR__.'/../config.php';

function url($path, $params = []) {
  $url = BASE_URL.'/'.$path;

  if (!empty($params)) {
    $querystring = http_build_query($params);
    $url.= '?'.$querystring;
  }

  return $url;
}

function assets($path) {
  return ASSETS_URL.'/'.$path;
}

function redirect($path) {
  header('Location: '.url($path));
  die();
}