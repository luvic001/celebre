<?php

if (!defined('PATH')) exit;

function is_user_logged_in() {

  $cookiename = 'clb_logged_in';
  $cookie = new cookie;

  $login = $cookie->get($cookiename);
  if (!$login) {
    $cookie->destroy($cookiename);
    return null;
  }

  $login = unjson($login);
  if (!$login) {
    $cookie->destroy($cookiename);
    return null;
  }

  return login(
    $login->user_email,
    $login->user_password
  ) ?? null;

}