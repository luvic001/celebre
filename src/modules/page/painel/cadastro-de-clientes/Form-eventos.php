<?php

if (!defined('PATH')) exit;
global $eventos, $client;

if ($eventos):
  $event = unjson($client->client_event);

?>


<div class="form-wire">
  <h3>Lista de Eventos</h3>

  <?php 
    foreach ($eventos as $key => $label): 
      $event_is_checked = ($event->{$key}->ingress) ? true : false;
      $event_full_date = ($event_is_checked) ? $event->{$key}->date : null;
      $event_date = $event_full_date ? ttime($event_full_date, '%Y-%m-%d') : null;
      $event_time = $event_full_date ? ttime($event_full_date, '%H:%M') : null;

  ?>
    
      <div class="box-evento">
        <h4><?= $label ?></h4>
        <div class="d-flex side-input">

          <div class="input-checkbox pl-0">
            <label>
              <input type="checkbox" fill-date-fields-checkbox="event-<?= $key ?>-date|event-<?= $key ?>-hour" name="event-<?= $key ?>-ingress" id="event-<?= $key ?>-ingress" <?= $event_is_checked ? 'checked' : null ?>>
              <span class="label-text">Ingresso/Pulseira</span>
            </label>
          </div>

          <div class="input-text">
            <label>
              <span class="label-text">Data</span>
              <input type="date" name="event-<?= $key ?>-date" id="event-<?= $key ?>-date" value="<?= $event_date ?>">
            </label>
          </div>

          <div class="input-text">
            <label>
              <span class="label-text">Hora</span>
              <input type="time" name="event-<?= $key ?>-hour" id="event-<?= $key ?>-hour" value="<?= $event_time ?>">
            </label>
          </div>

        </div><!-- .d-flex.side-input -->
      </div><!-- .box-evento -->

  <?php endforeach; ?>

</div>

<?php

endif;