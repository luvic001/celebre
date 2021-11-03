<?php

if (!defined('PATH')) exit;

function isset_date($str = null) {

  if (!$str) return false;

  return ($str !== '0000-00-00 00:00:00');

}