<?php

if (!defined('PATH')) exit;

class user {

  private $cookie;
  private $hashfier;

  public $usuario,
         $senha;
        
  public function __construct() {
    $this->cookie = new cookie;
    $this->hashfier = new controller\hashfier(AUTH_SALT);
  }

  public function set_usuario($usuario) {
    $this->usuario = $usuario;
  }

  public function set_senha($senha) {
    $this->senha = $senha;
  }

  public function login() {

    

  }

}