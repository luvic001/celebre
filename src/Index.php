<?php

if (!defined('PATH')) exit;

get('routes');
global $curRoute, $routes, $hashfier;
$hashfier = new controller\hashfier(AUTH_SALT);

if (!isset($routes->{$curRoute[0]}->PATH)) {
  define('CUR_PATH', 'page/404');
  http_response_code(404);
  $curRoute = 'not-found';
  @ (object) $routes->{$curRoute[0]}->TITLE = 'Ops, página não encontrada';
}
else {
  define('CUR_PATH',$routes->{$curRoute[0]}->PATH);
}

if (!$routes->{$curRoute[0]}->blank_page){
  get_modules('Header');
}

if (isset($routes->{$curRoute[0]}->PATH) AND $curRoute[0] !== 'index')
  get_modules('Menu-sidebar');

get_modules('Content', $routes->{$curRoute[0]}->PATH ?? 'page/404');

if (!$routes->{$curRoute[0]}->blank_page) {
  get_modules('Footer');
}