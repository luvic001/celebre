<?php

if (!defined('PATH')) exit;
global $locale, $is_user_logged_in;
get_modules('DatePickerRange-config', 'page/global');


if (is_promotor()):
  $eventos = get_eventos();
  
?>
<section class="header-interna">
  <div class="container-fluid d-md-flex justify-content-md-between align-items-md-end">

    <div class="alba-logo">
      <?php /*
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
      */ ?>
      <div>
        <p class="align-center align-md-left" style="line-height: 24px; font-size: 18px;">
          <?php foreach ($eventos as $evento): ?>
            - <?= $evento ?><br/>
          <?php endforeach; ?>
        </p>
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

<?php 

endif;