<?php

if (!defined('PATH')) exit;

?>

<section class="client-list site-sections">

  <div class="container-fluid"> 
    <div class="title-base d-flex align-items-end justify-content-between">

      <div class="section-title mb-2 mb-md-0">
        <h2>Lista de Clientes</h2>
      </div>
      
      <div class="section-filter w-100 mb-2 mb-md-0">
        <form>
          <div class="input-date-select">
            <div class="select-date-range">
              <p>Filtrar por data</p>
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