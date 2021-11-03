<?php

if (!defined('PATH')) exit;

function doc_exists($doctype, $doc) {

  global $db;
  
  $sql = 'SELECT * FROM clb_clientes WHERE ';

  if ($doctype == 1) {
    $sql .= '`client_cpf`';
  }
  elseif ($doctype == 2) {
    $sql .= '`client_rne`';
  }
  elseif ($doctype == 3) {
    $sql .= '`client_passaporte`';
  }

  $sql .= ' = :doc';

  $stmt = $db->prepare($sql);
  $stmt->execute([
    'doc' => $doc
  ]);

  return (bool) $stmt->fetchAll(PDO::FETCH_OBJ);

}