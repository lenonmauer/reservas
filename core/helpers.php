<?php
require_once __DIR__.'/../config.php';

function url($path) {
  return BASE_URL.'/'.$path;
}

function assets($path) {
  return ASSETS_URL.'/'.$path;
}

function redirect($path) {
  header('Location: '.url($path));
  die();
}