<?php

if (!defined('PATH')) exit;

global $is_user_logged_in;

get_modules('Header', 'page/global');

if (!$is_user_logged_in):
  ___('
    <p class="align-center mt-5" style="font-weight: 700;">Você deve estar logado para acessar esta página</p>
  ');
else:

  get_modules('Header-interna', 'page/global');

  global $vacinas, $eventos, $routeParams;
  $vacinas = get_vacinas();
  $eventos = get_eventos();

  if ($routeParams) {
    $client = undo_hash($routeParams[0]);
    if ($client) {
      $clientes = new clientes;
      $clientes->set_client_id($client);
      $client = $clientes->index()[0] ?? null;
    }
  }

  ?>


  <section class="site-sections ficha-de-clientes">
    <div class="container-fluid">
      
      <div class="title-base">
        <div class="section-title mb-2 mb-md-0">
          <h2><?= $client ? 'Ficha do Cliente' : 'Cadastro do Cliente' ?></h2>
        </div>
      </div>

      <?php get_modules('Form-busca-de-clientes', 'page/painel/cadastro-de-clientes') ?>

      <div class="box-content box-cadastro">

        <form action="<?= $client ? 'atualizacao-via-atendente' : 'cadastro-via-atendente' ?>" ajax-form="">
          <input type="hidden" name="insert_locale" value="<?= do_hash($is_user_logged_in['user_locale']) ?>">
          <?php 
            if ($client) {
              ?>
              <input type="hidden" name="client" value="<?= do_hash($client->ID) ?>">
              <?php
            }
          ?>
          <?php get_modules('Form-cadastro', 'page/painel/cadastro-de-clientes', [
            'client' => $client
          ]) ?>

          <div class="row mt-4">
            <?php get_modules('Form-vacina', 'page/painel/cadastro-de-clientes', [
              'client' => $client
            ]) ?>
            
            <div class="col-md-6">
              <div class="row">
                <div class="col-12">
                  <?php /* get_modules('Form-teste', 'page/painel/cadastro-de-clientes', [
                    'client' => $client
                  ]) */ ?>
                  <?php get_modules('Form-eventos', 'page/painel/cadastro-de-clientes', [
                    'client' => $client
                  ]) ?>
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
<?php

endif;