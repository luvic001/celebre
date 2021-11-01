<?php

if (!defined('PATH')) exit;

?>

<div class="box-content table-list no-shadow">

  <div class="heading-table">

    <!-- Adicionar novo -->
    <div class="heading-part add-new">
      <a href="<?= site_url() ?>/cadastro-de-cliente" title="Novo cadastro" class="btn-site">Novo cadastro</a>
    </div>

    <!-- Busca -->
    <div class="heading-part search-user">
      <form>
        <div class="input-text input-search">
          <label>
            <input type="text" name="search-term" id="search-term" placeholder="Buscar cliente..." required="">
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
          </label>
        </div>
      </form>
    </div><!-- .heading-part.search-user -->

    <!-- Total de clientes -->
    <div class="heading-part user-status-total">
      <p>Total de Clientes: 
        <span>100</span>
      </p>
    </div>

    <!-- Total de testados -->
    <div class="heading-part user-status-total-tested">
      <p>Clientes Testados: 
        <span>100</span>
      </p>
    </div>

  </div>

  <div class="body-table">
    <ul class="table-head">
      <li>Ação</li>
      <li>Nome</li>
      <li>CPF/RNE/Passaporte</li>
      <li>E-mail</li>
      <li>Celular</li>
      <li>Laboratório</li>
      <li>Data/Hora</li>
      <li>Vacina</li>
      <li>Resultado do Teste</li>
      <li>Ingresso/Pulseira</li>
    </ul>

    <?php for ($i=0; $i<14; $i++): ?>
    <ul>
      <li>
        <a href="#" class="btn-site ml-2">
          <i class="fas fa-edit mr-0"></i>
        </a>
      </li>
      <li><b>Bruno Granato Lisboa</b></li>
      <li>000.999.888-77</li>
      <li>bruno@agenciacampana.com.br</li>
      <li>(21) 98575-2225</li>
      <li>Alba Saúde Posto Jockey Club</li>
      <li>12/10/2021<br />17h45</li>
      <li>Oxford/Astrazeneca <br /> 2ª Dose, 20/10/2021</li>
      <li>Não Reagente</li>
      <li>Evento 1 <br> Evento 2 <br> Evento 3</li>
    </ul>
    <?php endfor; ?>

  </div>

  <div class="footer-pagination">
    <a href="#" class="btn-site btn-no-color">
      <i class="fas fa-download"></i>
      Baixar Relatório de Exames
    </a>

    <div class="d-flex pagination">

      <div class="paginate-number">
        <form class="d-flex align-items-center">
          <p class="mr-2">Exibir por vez:</p>
          <div class="input-select mt-1">
            <select>
              <option value="15">15</option>
            </select>
          </div>
        </form>
      </div>

      <div class="info">
        <p>1 - 10 de 76</p>
      </div>

      <div class="arrows">
        <ul>
          <li>
            <a href="#"><i class="fas fa-angle-double-left"></i></a>
          </li>
          <li>
            <a href="#"><i class="fas fa-angle-left"></i></a>
          </li>
          <li>
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </li>
          <li>
            <a href="#"><i class="fas fa-angle-double-right"></i></a>
          </li>
        </ul>
      </div>

    </div>

  </div>

</div>