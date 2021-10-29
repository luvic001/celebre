<?php

if (!defined('PATH')) exit;

global $success, $response_title, $code;

ob_start();
$module = get_modules($_POST['module'], 'global/ajax');
$content = ob_get_contents();
ob_end_clean();

if (!$module) fjson([
  'success' => false,
  'content' => 'Módulo não encontrado!'
], 400);

fjson([
  'success' => true,
  'content' => $content,
  'title' => $response_title
], isset($code) ? $code : (isset($success) ? (($success) ? 200: 400) : 200));