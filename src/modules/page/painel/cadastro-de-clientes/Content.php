<?php

if (!defined('PATH')) exit;

get_modules('Header', 'page/global');
get_modules('Header-interna', 'page/global');

global $vacinas, $eventos, $is_user_logged_in;
$vacinas = get_vacinas();
$eventos = get_eventos();

?>


<section class="site-sections ficha-de-clientes">
  <div class="container-fluid">
    
    <div class="title-base">
      <div class="section-title mb-2 mb-md-0">
        <h2>Ficha do cliente</h2>
      </div>
    </div>

    <div class="box-content box-cadastro">
      <form action="cadastro-via-atendente" ajax-form="">
        <input type="hidden" name="insert_locale" value="<?= do_hash($is_user_logged_in['user_locale']) ?>">

        <?php get_modules('Form-cadastro', 'page/painel/cadastro-de-clientes') ?>

        <div class="row mt-4">
          <?php get_modules('Form-vacina', 'page/painel/cadastro-de-clientes') ?>
          
          <div class="col-md-6">
            <div class="row">
              <div class="col-12">
                <?php get_modules('Form-teste', 'page/painel/cadastro-de-clientes') ?>
                <?php get_modules('Form-eventos', 'page/painel/cadastro-de-clientes') ?>
              </div>
            </div>
          </div>

          <div class="col-12 mt-5">
            <div class="input-submit" style="max-width: 340px; margin: 0 auto;">
              <input type="submit" value="Salvar dados do cliente">
            </div>
          </div>

        </div>

      </form>
    </div>

  </div>
</section>