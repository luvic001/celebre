<?php

if (!defined('PATH')) exit;

function email_exists($email) {

  $db_object = new db;
  return (bool) $db_object->select('clb_clientes', [
    'fields' => [
      'client_email' => $email
    ]
  ]);

}