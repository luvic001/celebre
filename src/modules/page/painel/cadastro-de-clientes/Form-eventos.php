<?php

if (!defined('PATH')) exit;
global $eventos;

if ($eventos):

?>


<div class="form-wire">
  <h3>Lista de Eventos</h3>

  <?php foreach ($eventos as $key => $label): ?>
    
  <div class="box-evento">
    <h4><?= $label ?></h4>
    <div class="d-flex side-input">

      <div class="input-checkbox pl-0">
        <label>
          <input type="checkbox" name="event-<?= $key ?>-ingress" id="event-<?= $key ?>-ingress">
          <span class="label-text">Ingresso/Pulseira</span>
        </label>
      </div>

      <div class="input-text">
        <label>
          <span class="label-text">Data</span>
          <input type="date" name="event-<?= $key ?>-date" id="event-<?= $key ?>-date">
        </label>
      </div>

      <div class="input-text">
        <label>
          <span class="label-text">Hora</span>
          <input type="time" name="event-<?= $key ?>-hour" id="event-<?= $key ?>-hour">
        </label>
      </div>

    </div><!-- .d-flex.side-input -->
  </div><!-- .box-evento -->

  <?php endforeach; ?>

</div>

<?php

endif;