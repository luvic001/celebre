<?php

if (!defined('PATH')) exit;

global $isUserLoggedIn;

if (!$isUserLoggedIn) fjson([
  'success' => false,
  'content' =>  'Você precisa estar logado para acessar este recurso'
], 401);

fjson([
  'success' => true,
  'content' => slugify($_POST['str'])
]);