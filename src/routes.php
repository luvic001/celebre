<?php

/**
 * 
 * @version 2.0
 * @author Lucas Victor
 * 
 * @since 1.0 - Introduced
 * @since 2.0 - Route Params
 * 
 */

if (!defined('PATH')) exit; 

global $host, $curRoute, $routes, $routeParams;

$curRoute = isset($_SERVER['REDIRECT_URL']) ? explode('/', $_SERVER['REDIRECT_URL']) : ['index'];

if (count($curRoute) > 1):

  unset($curRoute[0]);
  $routeLen = count($curRoute);
  if (empty($curRoute[$routeLen]) or $curRoute[$routeLen] == '') unset($curRoute[$routeLen]);

  foreach ($curRoute as $rt) {
    $rts[] = $rt;
  }

  $curRoute = $rts;

  for ($i = 1; $i < count($curRoute); $i++) {
    $routeParams[] = $curRoute[$i];
  }

endif;

$routes = [
  'index' => [
    'PATH' => 'page/home',
    'TITLE' => 'Celebre - Seu Evento sem Covid',
    'blank_page' => false
  ],
  'painel' => [
    'PATH' => 'page/painel/dashboard',
    'TITLE' => 'Painel | Celebre - Seu Evento sem Covid',
    'blank_page' => false
  ],
  'clientes' => [
    'PATH' => 'page/painel/clientes',
    'TITLE' => 'Clientes | Celebre - Seu Evento sem Covid',
    'blank_page' => false
  ],
  'cadastro-de-cliente' => [
    'PATH' => 'page/painel/cadastro-de-clientes',
    'TITLE' => 'Cadastro de Clientes | Celebre - Seu Evento sem Covid',
    'blank_page' => false
  ],
  'exportar-dados' => [
    'PATH' => 'page/exportar-dados',
    'TITLE' => '',
    'blank_page' => true
  ],
  'gerador-de-senhas' => [
    'PATH' => 'page/gerador-de-senhas',
    'TITLE' => '',
    'blank_page' => true
  ],
  'backend' => [
    'ajax' => [
      'PATH' => 'core/ajax-module'
    ],
    'slugify' => [
      'PATH' => 'core/slugify'
    ],
    'get-time' => [
      'PATH' => 'core/get-time'
    ],
    'login' => [
      'PATH' => 'celebre/login'
    ],
    'cadastro-via-atendente' => [
      'PATH' => 'celebre/cadastro-via-atendente'
    ],
    'atualizacao-via-atendente' => [
      'PATH' => 'celebre/atualizacao-via-atendente'
    ],
    'excluir-cliente' => [
      'PATH' => 'celebre/excluir-cliente'
    ],
    'search-user' => [
      'PATH' => 'celebre/search-user'
    ],
  ]
];

$routes = to_object($routes);

if ($curRoute == '') {
  $curRoute = 'index';
}
