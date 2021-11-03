<?php

if (!defined('PATH')) exit;

function get_locale($ID = null) {

  $db_object = new db;
  $stmt = $db_object->select('clb_locale');
  foreach ($stmt as $locale) {
    $locales[$locale['ID']] = $locale['locale_name'];
  }

  return $locales;

}