<?php

if (!defined('PATH')) exit;

function login($user_name = null, $password = null) {

  $user = new user;
  $user->set_usuario($user_name);
  $user->set_senha($password);

  $login = $user->login();

  return $login;

}