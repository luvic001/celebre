<?php

if (!defined('PATH')) exit;

?>


<div class="form-wire">
  <h3>Lista de Eventos</h3>

  <?php for ($i = 1; $i <= 4; $i++): ?>

  <div class="box-evento">
    <h4>Evento <?= $i ?></h4>
    <div class="d-flex side-input">

      <div class="input-checkbox pl-0">
        <label>
          <input type="checkbox" name="" id="">
          <span class="label-text">Ingresso/Pulseira</span>
        </label>
      </div>

      <div class="input-text">
        <label>
          <span class="label-text">Data</span>
          <input type="date" name="" id="">
        </label>
      </div>

      <div class="input-text">
        <label>
          <span class="label-text">Hora</span>
          <input type="time" name="" id="">
        </label>
      </div>

    </div><!-- .d-flex.side-input -->
  </div><!-- .box-evento -->

  <?php endfor; ?>

</div>