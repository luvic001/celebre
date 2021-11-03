<?php

if (!defined('PATH')) exit;

function get_vacinas($ID = null) {

  $db_object = new db;
  $stmt = $db_object->select('clb_vacinas');

  if (!$stmt) return false;

  foreach ($stmt as $vacina) {
    $vacinas[$vacina['ID']] = $vacina['vacina_name'];
  }

  return $vacinas[$ID] ?? $vacinas;

}