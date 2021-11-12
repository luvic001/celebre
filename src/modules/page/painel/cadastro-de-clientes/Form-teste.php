<?php

if (!defined('PATH')) exit;
global $client;

/*

$data = isset_date($client->client_test_covid_date) ? ttime($client->client_test_covid_date, '%Y-%m-%d') : null;
$hora = isset_date($client->client_test_covid_date) ? ttime($client->client_test_covid_date, '%H:%M') : null;

$result = [
  '1' => 'Reagente',
  '2' => 'Não reagente'
];

?>

<div class="form-wire mb-3">
  <h3>Teste de Covid</h3>

  <div class="d-flex side-input">
    <div class="input-text input-select">
      <label>
        <span class="label-text mb-4">Resultado</span>
        <?php if (!is_promotor()): ?>
        <select name="teste_covid_result" id="teste_covid_result" fill-date-fields-select="teste_covid_date|teste_covid_time">
          <option value="" <?= (!$client and !$client->client_test_covid_result) ? 'selected' : null ?>>Selecione</option>
          <option value="1" <?= ($client->client_test_covid_result == 1) ? 'selected' : null ?>>Reagente</option>
          <option value="2" <?= ($client->client_test_covid_result == 2) ? 'selected' : null ?>>Não Reagente</option>
        </select>
        <?php else: ?>
          <input type="hidden" name="teste_covid_result" value="<?= $client->client_test_covid_result ?>">
          <p style="margin-top: -14px;"><?= $result[$client->client_test_covid_result] ?? '-' ?></p>
        <?php endif; ?>
      </label>
    </div>
    <div class="input-text">
      <label>
        <span class="label-text">Data</span>
        <?php if (!is_promotor()): ?>
        <input type="date" name="teste_covid_date" id="teste_covid_date" value="<?= $data ?>">
        <?php else: ?>
          <input type="hidden" name="teste_covid_date" value="<?= $client->client_test_covid_date ?>">
          <p><?= $data ? date('d/m/Y', strtotime($data)) : '-' ?></p>
        <?php endif; ?>
      </label>
    </div>
    <div class="input-text">
      <label>
        <span class="label-text">Hora</span>
        <?php if (!is_promotor()): ?>
        <input type="time" name="teste_covid_time" id="teste_covid_time" value="<?= $hora ?>" <?= is_promotor() ? 'readonly' : null ?>>
        <?php else: ?>
          <input type="hidden" name="teste_covid_time" value="<?= $hora ?? null ?>">
          <p><?= $hora ? date('H:i', strtotime($date . ' ' . $hora)) : '-' ?></p>
        <?php endif; ?>
      </label>
    </div>
  </div>

</div>

*/
