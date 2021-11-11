<?php

if (!defined('PATH')) exit;
global $client;

$data = isset_date($client->client_test_covid_date) ? ttime($client->client_test_covid_date, '%Y-%m-%d') : null;
$hora = isset_date($client->client_test_covid_date) ? ttime($client->client_test_covid_date, '%H:%M') : null;

?>

<div class="form-wire mb-3 <?= is_promotor() ? 'disabled-div' : null ?>">
  <h3>Teste de Covid</h3>

  <div class="d-flex side-input">
    <div class="input-text input-select">
      <label>
        <span class="label-text mb-4">Resultado</span>
        <select name="teste_covid_result" id="teste_covid_result" fill-date-fields-select="teste_covid_date|teste_covid_time" <?= is_promotor() ? 'disabled-input' : null ?>>
          <option value="" <?= (!$client and !$client->client_test_covid_result) ? 'selected' : null ?>>Selecione</option>
          <option value="1" <?= ($client->client_test_covid_result == 1) ? 'selected' : null ?>>Reagente</option>
          <option value="2" <?= ($client->client_test_covid_result == 2) ? 'selected' : null ?>>Não Reagente</option>
        </select>
      </label>
    </div>
    <div class="input-text">
      <label>
        <span class="label-text">Data</span>
        <input type="date" name="teste_covid_date" id="teste_covid_date" value="<?= $data ?>" <?= is_promotor() ? 'readonly' : null ?>>
      </label>
    </div>
    <div class="input-text">
      <label>
        <span class="label-text">Hora</span>
        <input type="time" name="teste_covid_time" id="teste_covid_time" value="<?= $hora ?>" <?= is_promotor() ? 'readonly' : null ?>>
      </label>
    </div>
  </div>

</div>