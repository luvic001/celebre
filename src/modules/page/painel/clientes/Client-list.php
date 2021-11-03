<?php

if (!defined('PATH')) exit;
global $is_date_filter;
$validateField = new validateField;

$validateField->setValue($_GET['data_inicial']);
$data_inicial_valid = $validateField->field_date(true);

$validateField->setValue($_GET['data_final']);
$data_final_valid = $validateField->field_date(true);

$is_date_filter = ($data_inicial_valid and $data_final_valid);

?>

<section class="client-list site-sections">

  <div class="container-fluid"> 
    <div class="title-base d-flex align-items-end justify-content-between">

      <div class="section-title mb-2 mb-md-0">
        <h2>Lista de Clientes</h2>
      </div>
      
      <div class="section-filter w-100 mb-2 mb-md-0 d-flex">
        <?php if ($is_date_filter): ?>
          <a href="<?= site_url() ?>/clientes" class="btn-site btn-dangeous" style="font-size: 10px;">limpar</a>
        <?php endif; ?>
        <form class="w-100">
          <div class="input-date-select">
            <div class="select-date-range">
              <?php if ($is_date_filter): ?>
                <p>
                  <?= ttime($_GET['data_inicial'], '%d/%m/%Y') ?> - <?= ttime($_GET['data_final'], '%d/%m/%Y') ?>
                </p>
              <?php else: ?>
                <p>Filtrar por data</p>
              <?php endif; ?>
              <i class="fas fa-calendar-alt"></i>
            </div>
          </div>
        </form>
      </div>

    </div>

    <!-- Tabela de clientes -->
    <?php get_modules('Client-list-table', 'page/painel/clientes') ?>

  </div>

</section>