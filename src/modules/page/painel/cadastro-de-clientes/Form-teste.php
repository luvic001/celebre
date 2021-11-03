<?php

if (!defined('PATH')) exit;

?>

<div class="form-wire mb-3">
  <h3>Teste de Covid</h3>

  <div class="d-flex side-input">
    <div class="input-text pl-0">
      <label>
        <span class="label-text">Data</span>
        <input type="date" name="teste_covid_date" value="teste_covid_date">
      </label>
    </div>
    <div class="input-text">
      <label>
        <span class="label-text">Hora</span>
        <input type="time" name="teste_covid_time" value="teste_covid_time">
      </label>
    </div>
    <div class="input-text input-select">
      <label>
        <span class="label-text">Resultado</span>
        <select name="teste_covid_result" id="teste_covid_result">
          <option value="">Selecione</option>
          <option value="1">Reagente</option>
          <option value="2">Não Reagente</option>
        </select>
      </label>
    </div>
  </div>

</div>