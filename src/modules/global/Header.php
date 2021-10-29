<?php

if (!defined('PATH')) exit; 
global $routes, $curRoute;

?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $routes->{$curRoute[0]}->TITLE ?></title>
  <meta name="theme-color" content="#000">
  <link rel="icon" href="<?= get_image('ico-cardapio-seguro.png') ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <?php if (function_exists('load_fonts')) load_fonts() ?>
  <?php load_extra_css() ?>
  <style>
    <?= get_file('style.css') ?>
  </style>
  <script src="<?= SITE_URL ?>/src/js/jQuery.min.js"></script>
  <script src="<?= SITE_URL ?>/src/js/jquery-input-mask.min.js"></script>

  <script>
    let site_url = '<?= site_url() ?>';
    let page_title = '<?= $routes->{$curRoute[0]}->TITLE ?>';
    let siteLoader = `
    <div class="loading-options">
      <?= svg('lds-ring') ?>
      <p>Carregando</p>
    </div>
    `;
    <?= get_file('js/script.min.js') ?>
  </script>
	<script src="https://kit.fontawesome.com/c454b0919f.js" crossorigin="anonymous"></script>
  
</head>
<body>

<main class="site-main">

<?php get_modules('Popup') ?>