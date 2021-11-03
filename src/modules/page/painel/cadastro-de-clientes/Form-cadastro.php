<?php

if (!defined('PATH')) exit; 
global $is_user_logged_in, $client;

?>

<div class="col-12 d-flex justify-content-center flex-wrap form-cadastro">
  
  <div class="col-md-6">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">Nome completo</span>
        <input type="text" name="client_name" id="client_name" value="<?= $client->client_name ?>">
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="row">
      
      <div class="col-md-3">
        <div class="input-text input-select">
          <label>
            <span class="label-text" style="margin-bottom: 20px;">Documento</span>
            <select name="client_doctype" id="client_doctype" doc-change>
              <option value="1" <?= (!$client or $client->client_doctype == 1) ? 'selected' : null ?>>CPF</option>
              <option value="2" <?= ($client->client_doctype == 2) ? 'selected' : null ?>>RNE</option>
              <option value="3" <?= ($client->client_doctype == 3) ? 'selected' : null ?>>Passaporte</option>
            </select>
          </label>
        </div>
      </div>

      <div class="col-md-9">
        <div class="row">

          <!-- CPF -->
          <div class="col-12 <?= (!$client or $client->client_doctype == 1) ? 'active' : null ?>" result-doc="1">
            <div class="input-text mb-4">
              <label>
                <span class="label-text">CPF</span>
                <input type="text" name="client_cpf" id="client_cpf" mask="cpf" maxlength="14" value="<?= cpf($client->client_cpf) ?>">
              </label>
            </div>
          </div>

          <!-- RNE -->
          <div class="col-12 <?= ($client->client_doctype == 2) ? 'active' : null ?>" result-doc="2">
            <div class="row">

              <div class="col-md-5">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">RNE</span>
                    <input type="text" name="client_rne" id="client_rne" value="<?= $client->client_rne ?>">
                  </label>
                </div>
              </div>

              <div class="col-md-7">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">País de Origem</span>
                    <input type="text" name="client_country_origin" id="client_country_origin" value="<?= $client->client_country_origin ?>">
                  </label>
                </div>
              </div>

            </div>
          </div>

          <!-- Passaporte -->
          <div class="col-12 <?= ($client->client_doctype == 3) ? 'active' : null ?>" result-doc="3">
            <div class="row">

              <div class="col-md-5">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">Passaporte</span>
                    <input type="text" name="client_passaporte" id="client_passaporte" value="<?= $client->client_passaporte ?>">
                  </label>
                </div>
              </div>

              <div class="col-md-7">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">País de Origem</span>
                    <input type="text" name="client_country_origin_2" id="client_country_origin_2" value="<?= $client->client_country_origin_2 ?>">
                  </label>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="col-12"></div>

  <div class="col-md-6">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">E-mail</span>
        <input type="text" name="client_email" id="client_email" value="<?= $client->client_email ?>">
      </label>
    </div>
  </div>

  <div class="col-md-3">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">Celular</span>
        <input type="text" name="client_phone" id="client_phone" mask="cel" maxlength="15" value="<?= telefone($client->client_phone) ?>">
      </label>
    </div>
  </div>

  <div class="col-md-3">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">Data de Nascimento</span>
        <input type="date" name="client_nascimento" id="client_nascimento" value="<?= isset_date($client->client_nascimento) ? ttime($client->client_nascimento, '%Y-%m-%d') : null ?>">
      </label>
    </div>
  </div>

</div><!-- Form Cadastro -->
