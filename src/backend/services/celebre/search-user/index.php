<?php

if (!defined('PATH')) exit;

global $is_user_logged_in;
$is_user_logged_in = is_user_logged_in()[0];

if (!$is_user_logged_in) fjson([
  'success' => false,
  'content' => 'Você precisa estar logado para continuar'
], 200);

if (empty($_POST['search_term'])) {
  fjson([
    'success' => true,
    'content' => ''
  ]);
}

$search_term = strip_tags($_POST['search_term']);

$clientes = new clientes;

$validateFields = new validateField;
$validateFields->setType('field_cpf');
$validateFields->setValue($search_term);

if ($validateFields->check()) {
  $search_term = only_number($search_term);
}
elseif (is_celular($search_term)) {
  $search_term = only_number($search_term);
}
$clientes->set_limit(5);
$clientes_lista = $clientes->index_by_term($search_term, true);

ob_start();

if ($clientes_lista) {
  ?>
  <ul class="client-list-realtime">
    <?php foreach ($clientes_lista as $cl): ?>
      <li>
        <a href="<?= site_url() ?>/cadastro-de-cliente/<?= do_hash($cl->ID) ?>">
          <span class="users-content">
            <span class="title"><?= $cl->client_name ?></span>
            <span class="minor-text"><?= $cl->client_email ?></span>
            <?php if ($cl->client_doctype == 1): ?>
              <span class="minor-text"><b>CPF:</b> <?= cpf($cl->client_cpf) ?></span>
            <?php elseif ($cl->client_doctype == 2): ?>
              <span class="minor-text"><b>RNE:</b> <?= $cl->client_rne ?> / <b>Origem:</b> <?= $cl->client_country_origin ?></span>
            <?php elseif ($cl->client_doctype == 3): ?>
              <span class="minor-text"><b>RNE:</b> <?= $cl->client_passaporte ?> / <b>Origem:</b> <?= $cl->client_country_origin_2 ?></span>
            <?php endif; ?>
          </span>
          <span class="edit-button">
            <span class="btn-site">Selecionar cliente</span>
          </span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php
}

else {
  ?>
    <p class="mt-3">Nenhum cliente encontrado</p>
  <?php
}

$content = ob_get_contents();
ob_end_clean();

fjson([
  'success' => true,
  'content' => $content
]);