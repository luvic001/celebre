<?php

if (!defined('PATH')) exit;

$is_user_logged_in = is_user_logged_in();
if (!$is_user_logged_in) fjson([
 'success' => false,
 'content' => 'Você deve estar logado para realizar esta ação'
], 400);

$insert_locale = $_POST['insert_locale'];
$insert_locale = undo_hash($insert_locale);
if (!$insert_locale) fjson([
  'success' => false,
  'content' => 'Não foi possível validar o posto de acesso.'
], 400);

$client_id = $_POST['client'];
$client_id = undo_hash($client_id);

$clientes = new clientes;
$clientes->set_client_id($client_id);

$client = $clientes->index()[0];
if (!$client) fjson([
  'success' => false,
  'content' => 'Cliente não encontrado'
], 400);

$validateField = new validateField;

// Validando nome
$validateField->setType();
$validateField->setValue($_POST['client_name']);
if (!$_POST['client_name']) {
  $err[] = [
    'field' => 'client_name',
    'content' => 'O campo <b>nome</b> é obrigatório.'
  ];
}
elseif (!$validateField->check()) {
  $err[] = [
    'field' => 'client_name',
    'content' => 'Não utilize caracteres especiais em <b>nome</b>'
  ];
}

// Validando E-mail
$validateField->setType('field_email');
$validateField->setValue($_POST['client_email']);
if (!$_POST['client_email']) {
  $err[] = [
    'field' => 'client_email',
    'content' => 'O campo <b>e-mail</b> é obrigatório'
  ];
}
elseif (!$validateField->check()) {
  $err[] = [
    'field' => 'client_email',
    'content' => 'E-mail inválido'
  ];
}
elseif ( ($client->client_email !== $_POST['client_email']) and (email_exists($_POST['client_email'])) ) {
  $err[] = [
    'field' => 'client_email',
    'content' => 'Este e-mail já está cadastrado'
  ];
}

// Validando Documentos
$doctype = [1, 2, 3];
if (!in_array($_POST['client_doctype'], $doctype)) {
  $err[] = [
    'field' => 'client_doctype',
    'content' => 'Selecione o tipo de documento'
  ];
}
// CPF
elseif ($_POST['client_doctype'] == 1) {

  $validateField->setType('field_cpf');
  $validateField->setValue($_POST['client_cpf']);
  if (!$_POST['client_cpf']) {
    $err[] = [
      'field' => 'client_cpf',
      'content' => 'O CPF é obrigatório'
    ];
  }
  elseif (!$validateField->check()) {
    $err[] = [
      'field' => 'client_cpf',
      'content' => 'CPF inválido'
    ];
  }
  elseif ( ($client->client_cpf !== only_number($_POST['client_cpf'])) and (doc_exists(1, only_number($_POST['client_cpf'])))) {
    $err[] = [
      'field' => 'client_cpf',
      'content' => 'CPF já cadastrado'
    ];
  }

}
// RNE
elseif ($_POST['client_doctype'] == 2) {
  if (!$_POST['client_rne']) {
    $err[] = [
      'field' => 'client_rne',
      'content' => 'Informe o RNE'
    ];
  }
  elseif ( ($client->client_rne !== $_POST['client_rne']) and (doc_exists(2, $_POST['client_rne']))) {
    $err[] = [
      'field' => 'client_rne',
      'content' => 'RNE já cadastrado'
    ];
  }
  
  if (!$_POST['client_country_origin']) {
    $err[] = [
      'field' => 'client_country_origin',
      'content' => 'Informe o país de origem'
    ];
  }
}

// Passaporte
elseif ($_POST['client_doctype'] == 3) {
  if (!$_POST['client_passaporte']) {
    $err[] = [
      'field' => 'client_passaporte',
      'content' => 'Informe o número do passaporte'
    ];
  }
  elseif ( ($client->client_passaporte !== $_POST['client_passaporte']) and (doc_exists(3, $_POST['client_passaporte']))) {
    $err[] = [
      'field' => 'client_passaporte',
      'content' => 'Passaporte já cadastrado'
    ];
  }

  if (!$_POST['client_country_origin_2']) {
    $err[] = [
      'field' => 'client_country_origin_2',
      'content' => 'Informe o país de origem'
    ];
  }
  
}

// Número de telefone
$validateField->setType('field_phone');
$validateField->setValue($_POST['client_phone']);
if (!$_POST['client_phone']) {
  $err[] = [
    'field' => 'client_phone',
    'content' => 'O telefone é obrigatório'
  ];
}
elseif (!$validateField->check()) {
  $err[] = [
    'field' => 'client_phone',
    'content' => 'Número de telefone inválido'
  ];
}

// Data
$validateField->setValue($_POST['client_nascimento']);
if (!$_POST['client_nascimento']) {
  $err[] = [
    'field' => 'client_nascimento',
    'content' => 'Preencha a data de nascimento'
  ];
}
elseif (!$validateField->field_date(true)) {
  $err[] = [
    'field' => 'client_nascimento',
    'content' => 'Data de nascimento inválida'
  ];
}

// ======== RESULTADO ========

ob_start();

if ($err) {
?>
  <p class="mb-3">Ocorreu (ram) erros aos atualizar os dados de cadastro:</p>
  <ul>

    <?php foreach ($err as $e): ?>
      <li>
        <span><?= $e['content'] ?></span>
        <script>
          jQuery(function($){
            $.add_field_error('#<?= $e['field'] ?>', '<?= $e['content'] ?>');
          });
        </script>
      </li>
    <?php endforeach; ?>

  </ul>
<?php
}
else {

  $clientes->set_insert_locale($insert_locale);

  $clientes->set_client_name($_POST['client_name']);
  $clientes->set_client_email($_POST['client_email']);
  $clientes->set_client_phone(only_number($_POST['client_phone']));
  $clientes->set_client_nascimento($_POST['client_nascimento']);
  $clientes->set_client_doctype(only_number($_POST['client_doctype']));
  
  if ($_POST['client_doctype'] == 1) {
    $clientes->set_client_cpf(only_number($_POST['client_cpf']));
    $clientes->set_client_rne(null);
    $clientes->set_client_country_origin(null);
    $clientes->set_client_passaporte(null);
    $clientes->set_client_country_origin_2(null);
  }
  
  elseif ($_POST['client_doctype'] == 2) {
    $clientes->set_client_cpf(null);
    $clientes->set_client_rne($_POST['client_rne']);
    $clientes->set_client_country_origin($_POST['client_country_origin']);
    $clientes->set_client_passaporte(null);
    $clientes->set_client_country_origin_2(null);
  }
  elseif ($_POST['client_doctype'] == 3) {
    $clientes->set_client_cpf(null);
    $clientes->set_client_rne(null);
    $clientes->set_client_country_origin(null);
    $clientes->set_client_passaporte($_POST['client_passaporte']);
    $clientes->set_client_country_origin_2($_POST['client_country_origin_2']);
  }

  // Cadastros do evento
  $clientes->set_client_test_covid_date($_POST['teste_covid_date'] . ':' . $_POST['teste_covid_time']);
  $clientes->set_client_test_covid_result($_POST['teste_covid_result']);
  $clientes->set_client_1_dose_date($_POST['vacina_1_dose_data']);
  $clientes->set_client_1_dose_fabricante($_POST['vacina_1_dose_fabricante']);
  $clientes->set_client_2_dose_date($_POST['vacina_2_dose_data']);
  $clientes->set_client_2_dose_fabricante($_POST['vacina_2_dose_fabricante']);
  $clientes->set_client_3_dose_date($_POST['vacina_3_dose_data']);
  $clientes->set_client_3_dose_fabricante($_POST['vacina_3_dose_fabricante']);
  $clientes->set_client_event('');
  $update = $clientes->update();

  if ($update) {
    ___('
      <p>Cadastro atualizado com sucesso</p>
      <script>
        window.setTimeout(() => {
          window.location.reload(true);
        }, 900);
      </script>
    
    ');
  }
  else {
    ___('<p>Não foi possível atualizar o cadastro</p>');
  }

}

$content = ob_get_contents();
ob_end_clean();

$success = (!$err and $update);

fjson([
  'success' => $success,
  'content' => $content
], $success ? 200 : 400);