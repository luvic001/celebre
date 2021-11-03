<?php

if (!defined('PATH')) exit;
global $vacinas;

?>

<div class="col-md-6">

  <div class="form-wire mb-3">

    <h3>Vacina</h3>

    <div class="d-flex side-input">
      <h4>1° dose</h4>
      <div class="input-text">
        <label>
          <span class="label-text">Data</span>
          <input type="date" name="vacina_1_dose_data" id="vacina_1_dose_data">
        </label>
      </div>
      <div class="input-text input-select">
        <label>
          <span class="label-text">Fabricante</span>
          <select name="vacina_1_dose_fabricante" id="vacina_1_dose_fabricante">
            <option value="">Selecione</option>
            <?php foreach ($vacinas as $key => $label): ?>
              <option value="<?= $key ?>"><?= $label ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </div>
    </div>

    <div class="d-flex side-input">
      <h4>2° dose</h4>
      <div class="input-text">
        <label>
          <span class="label-text">Data</span>
          <input type="date" name="vacina_2_dose_data" id="vacina_2_dose_data">
        </label>
      </div>
      <div class="input-text input-select">
        <label>
          <span class="label-text">Fabricante</span>
          <select name="vacina_2_dose_fabricante" id="vacina_2_dose_fabricante">
            <option value="">Selecione</option>
            <?php foreach ($vacinas as $key => $label): ?>
              <option value="<?= $key ?>"><?= $label ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </div>
    </div>

    <div class="d-flex side-input">
      <h4>3° dose</h4>
      <div class="input-text">
        <label>
          <span class="label-text">Data</span>
          <input type="date" name="vacina_3_dose_data" id="vacina_3_dose_data">
        </label>
      </div>
      <div class="input-text input-select">
        <label>
          <span class="label-text">Fabricante</span>
          <select name="vacina_3_dose_fabricante" id="vacina_3_dose_fabricante">
            <option value="">Selecione</option>
            <?php foreach ($vacinas as $key => $label): ?>
              <option value="<?= $key ?>"><?= $label ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </div>
    </div>

  </div><!-- .form-wire -->

</div>