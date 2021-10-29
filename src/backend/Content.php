<?php

if (!defined('PATH')) exit;

global $routes, $curRoute;
$method = sprintf('backend/services/%s/index', $routes->backend->{$curRoute[0]}->PATH);
get($method);