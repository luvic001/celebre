<?php

if (!defined('PATH')) exit;
global $locale, $is_user_logged_in;
get_modules('DatePickerRange-config', 'page/global');

?>

<section class="header-interna">
  <div class="container-fluid d-md-flex justify-content-md-between align-items-md-end">

    <div class="alba-logo d-md-flex align-items-md-end">
      <div class="mr-md-5">
        <figure>
          <a 
            href="https://albasaude.com.br" 
            title="Alba Saúde | Consultas médicas e exames a preços populares" 
            target="_blank"
            class="d-block">
            <img 
              src="<?= get_image('logo-alba-fundo-transparente.png') ?>" 
              alt="Alba Saúde">
          </a>
        </figure>
      </div>
      <div>
        <p class="align-center align-md-left"><?= $locale[$is_user_logged_in['user_locale']] ?></p>
      </div>
    </div>

    <div class="go-back-link">
      <a href="javascript:history.back(-1);" class="btn-site btn-wire">
        <i class="fa fa-angle-left"></i>
        Voltar
      </a>
    </div>
    
  </div>
</section>