<?php

if (!defined('PATH')) exit;

global $is_user_logged_in;

get_modules('Header', 'page/global');

if (!$is_user_logged_in):
  ___('
    <p class="align-center mt-5" style="font-weight: 700;">Você deve estar logado para acessar esta página</p>
  ');
else:
  global $is_admin;
  $is_admin = is_admin();
  
  get_modules('Header-interna', 'page/global');
  get_modules('Client-list', 'page/painel/clientes');
endif;