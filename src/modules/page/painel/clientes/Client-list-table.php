<?php

if (!defined('PATH')) exit;

global $locale, $routeParams;

global $vacinas, $eventos, $is_user_logged_in, $is_admin;
$vacinas = get_vacinas();
$eventos = get_eventos();

$clientes = new clientes;

if ($routeParams and is_numeric($routeParams[0])) {
  $clientes->set_pagination($routeParams[0]);
}

$limits = [
  '15',
  '30',
  '60',
  '100',
  '150'
];
if ($_GET['limit'] and is_numeric($_GET['limit'])) {
  
  $limit = only_number($_GET['limit']);
  if (in_array($limit, $limits)) {
    $clientes->set_limit(only_number($_GET['limit']));
  }
  
}

$clientes_lista = $clientes->index();
$clientes_total = $clientes->get_total();
$clientes_total_testados = $clientes->get_total_testados();
$client_test_result = client_test_result();

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
            <input type="text" name="search-term" id="search-term" placeholder="Buscar cliente por CPF/RNE/Passaporte/Email/Celular" required="">
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
        <span><?= $clientes_total ?></span>
      </p>
    </div>

    <!-- Total de testados -->
    <div class="heading-part user-status-total-tested">
      <p>Clientes Testados: 
        <span><?= $clientes_total_testados ?></span>
        <a href="javascript:window.location.reload(true);" title="Recarregar página" class="ml-3">
          <i class="fas fa-redo-alt"></i>
        </a>
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
      <li>Data/Hora do teste</li>
      <li>Vacina</li>
      <li>Resultado do Teste</li>
      <li>Ingresso/Pulseira</li>
    </ul>

    <?php if ($clientes_lista): ?>
      <?php foreach ($clientes_lista as $client): $event = unjson($client->client_event) ?? null; ?>
        <ul>
          <li>
            <a href="<?= site_url() ?>/cadastro-de-cliente/<?= do_hash($client->ID) ?>" class="btn-site ml-2">
              <i class="fas fa-edit mr-0"></i>
            </a><br/>
            <?php if ($is_admin): ?>
              <a href="javascript:void(0);" delete-client="<?= do_hash($client->ID) ?>" title="excluir <?= $client->client_name ?>" class="btn-site btn-dangeous ml-2 mt-2">
                <i class="far fa-trash-alt mr-0"></i>
              </a>
            <?php endif; ?>
          </li>
          <li>
            <b><?= $client->client_name ?></b>
          </li>
          
          <?php if ($client->client_doctype == 1): ?>
            <li><?= cpf($client->client_cpf) ?></li>
          <?php elseif ($client->client_doctype == 2): ?>
            <li><?= $client->client_rne ?></li>
          <?php elseif ($client->client_doctype == 3): ?>
            <li><?= $client->client_passaporte ?></li>
          <?php else: ?>
            <li></li>
          <?php endif; ?>

          <li class="client-email"><?= $client->client_email ?></li>
          <li><?= telefone($client->client_phone) ?></li>
          <li><?= $locale[$client->insert_locale] ?></li>
          <li>
            <?php 
            if (isset_date($client->client_test_covid_date)): 
              ___(ttime($client->client_test_covid_date, '%d/%m/%Y <br> %H:%M'));
            endif; 
            ?>
          </li>
          <li>
            <?php 
            
            if (isset_date($client->client_3_dose_date) and $client->client_3_dose_fabricante !== 0) {
              ___($vacinas[$client->client_3_dose_fabricante]);
              ___('<br>3° dose, ');
              ___(ttime($client->client_3_dose_date, '%d/%m/%Y'));
            }

            elseif (isset_date($client->client_2_dose_date) and $client->client_2_dose_fabricante !== 0) {
              ___($vacinas[$client->client_2_dose_fabricante]);
              ___('<br>2° dose, ');
              ___(ttime($client->client_2_dose_date, '%d/%m/%Y'));
            }
            elseif (isset_date($client->client_1_dose_date) and $client->client_1_dose_fabricante !== 0) {
              ___($vacinas[$client->client_1_dose_fabricante]);
              ___('<br>1° dose, ');
              ___(ttime($client->client_1_dose_date, '%d/%m/%Y'));
            }
            
            ?>
          </li>
          <li><?= $client_test_result[$client->client_test_covid_result] ?></li>
          <li>
            <ul class="event-list">
              <?php foreach ($eventos as $ID => $label): ?>
                <?php if ($event->{$ID}->ingress): ?>
                  <li><?= $label ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
      <?php endforeach; ?>
    <?php else: ?>
      <ul>
        <li class="w-100" style="max-width: 100%;">
          <p>Nenhum cliente encontrado</p>
        </li>
      </ul>
    <?php endif; ?>

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
            <select limit-change>
              <?php foreach ($limits as $lmt): ?>
                <option value="<?= $lmt ?>"<?= ($limit == $lmt) ? 'selected' : null ?>><?= $lmt ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
      </div>

      <div class="info">
        <p><?= $clientes->get_current_page() ?> - <?= $clientes->get_limit() ?> de <?= $clientes_total ?></p>
      </div>
      
      <?php 

        $next_pagination = $clientes->get_current_page() + 1;
        $previous_pagination = $clientes->get_current_page() - 1;
        $max_pagination = $clientes->get_max_pagination();
        
        if ($clientes->get_limit() < $clientes->get_current_total_query()):

      ?>
          <div class="arrows">
            <ul>
              <li>
                <a href="<?= site_url() ?>/clientes"><i class="fas fa-angle-double-left"></i></a>
              </li>
              <li>
                <a href="<?= site_url() ?>/clientes/<?= ($previous_pagination < 2) ? null : $previous_pagination ?>"><i class="fas fa-angle-left"></i></a>
              </li>
              <li>
                <a href="<?= site_url() ?>/clientes/<?= ($next_pagination > $max_pagination) ? $max_pagination : $next_pagination ?>"><i class="fas fa-angle-right"></i></a>
              </li>
              <li>
                <a href="<?= site_url() ?>/clientes/<?= $max_pagination ?>"><i class="fas fa-angle-double-right"></i></a>
              </li>
            </ul>
          </div>

      <?php endif; ?>

    </div>

  </div>

</div>