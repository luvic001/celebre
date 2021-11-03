<?php

if (!defined('PATH')) exit;

get_modules('Header', 'page/global');

global $is_user_logged_in, $locale;

?>

<section class="dashboard site-sections">
  <div class="container">
    
    <div class="box-content no-shadow no-background align-center">
      <a href="https://albasaude.com.br" target="_blank" title="Alba Saúde | Consultas médicas e exames a preços populares">
      <figure class="alba-logo">
        <img src="<?= get_image('logo-alba-fundo-transparente.png') ?>" alt="Alba Saúde Logo">
      </figure>
    </a>
  </div>
  <?php if ($locale): ?>
  <div class="box-content mb-4 pt-0 no-shadow no-background align-center username-description">
    <p><?= $locale[$is_user_logged_in['user_locale']] ?></p>
  </div>
  <?php endif; ?>

  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

      <div class="box-content mb-3">
        <p class="box-title mb-3 d-flex align-items-center justify-content-between">
          <span>Buscar cliente</span>
          <a href="<?= site_url() ?>/clientes" title="Ver todos">Ver todos
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </p>

        <div class="pt-4 pb-4">
          <form>
            <div class="input-text input-search">
              <label>
                <input type="text" name="search-term" id="search-term" placeholder="CPF/RNE/Passaporte/Email/Telefone/etc..." required="">
                <button type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </label>
            </div>
          </form>
        </div>

      </div>

      <div class="box-content">
        <p class="box-title mb-4 d-flex align-items-center justify-content-between">
          <span>Cadastrar Cliente</span>
        </p>

        <div class="align-center mb-3">
          <a href="<?= site_url() ?>/cadastro-de-cliente" class="btn-site" title="Iniciar novo cadastro">Iniciar novo cadastro</a>
        </div>

      </div>

    </div><!--  .col-lg-6.col-md-8 -->
  </div><!-- .row.justify-content-center -->

  </div>
</section>