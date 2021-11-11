<?php

if (!defined('PATH')) exit;

function get_eventos($ID = null) {

  $db_object = new db;
  if ($ID) {
    $args['fields'] = [
      'ID' => $ID
    ];
  }

  $args['fields']['event_is_active'] = 1;

  $stmt = $db_object->select('clb_eventos', $args ?? null);

  if (!$stmt) return false;

  foreach ($stmt as $evento) {
    $eventos[$evento['ID']] = $evento['evento_name'];
  }

  if (is_promotor()) {
    foreach ($eventos as $ID => $event) {
      if (in_array($ID, is_promotor())) {
        $event_promotor[$ID] = $event;
      }
    }
    $eventos = $event_promotor;
  }

  return $eventos;

}