<?php

if (!defined('PATH')) exit;

?>
<div class="box-content mb-3">

  <div class="mb-3 form-wire">
    <h3 class="mb-3">Buscar usuário existente</h3>
    <form realtime-search-form>
      <div class="input-text input-search">
        <label>
          <input type="text" realtime-search name="realtime-search" id="realtime-search" value="" placeholder="Nome, CPF, RNE, Passaporte, Email, Celular." required="">
          <button type="submit">
            <i class="fas fa-search"></i>
          </button>
        </label>
      </div>
    </form>
    <div class="realtime-response" realtime-response></div>
  </div>
  
</div>