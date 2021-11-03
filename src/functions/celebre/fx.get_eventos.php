<?php

if (!defined('PATH')) exit;

function get_eventos($ID = null) {

  $db_object = new db;
  if ($ID) {
    $args['fields'] = [
      'ID' => $ID
    ];
  }

  $stmt = $db_object->select('clb_eventos', $args ?? null);

  if (!$stmt) return false;

  foreach ($stmt as $evento) {
    $eventos[$evento['ID']] = $evento['evento_name'];
  }

  return $eventos;

}