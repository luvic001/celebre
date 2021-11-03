<?php

if (!defined('PATH')) exit;

function is_admin() {

  global $is_user_logged_in;

  if (!$is_user_logged_in) {
    $is_user_logged_in = is_user_logged_in()[0];
  }

  if (!$is_user_logged_in) return false;

  return ($is_user_logged_in['user_level'] == 2);

}