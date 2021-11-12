<?php

if (!defined('PATH')) exit;

function can_export() {

  global $is_user_logged_in;
  
  if (!is_promotor()) return true;

  return (bool) (
    $is_user_logged_in['can_export'] > 0
  );

}