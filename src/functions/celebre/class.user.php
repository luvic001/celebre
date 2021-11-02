<?php

if (!defined('PATH')) exit;

class user {

  const TABLE_NAME_USERS = 'clb_users';
  const LOGGED_COOKIE_NAME = 'clb_logged_in';

  private $db_object;
  private $cookie;

  public $usuario,
         $senha;
        
  public function __construct() {
    $this->cookie = new cookie;
    $this->db_object = new db;
  }

  private function db() {
    return $this->db_object;
  }

  private function cookie() {
    return $this->cookie;
  }

  public function set_usuario($usuario) {
    $this->usuario = $usuario;
  }

  public function set_senha($senha) {
    $this->senha = $senha;
  }

  public function login() {
    
    $stmt = self::db()->select(
      self::TABLE_NAME_USERS,
      [ 
        'fields' => [
          'user_email' => $this->usuario,
          'user_password' => do_hash($this->senha)
        ] 
      ]
    );

    if (!$stmt) return null;

    $logged_in_json = json([
      'user_email' => $this->usuario,
      'user_password' => $this->senha
    ]);

    self::cookie()->set(
      self::LOGGED_COOKIE_NAME, 
      $logged_in_json
    );

    return $stmt;

  }

}