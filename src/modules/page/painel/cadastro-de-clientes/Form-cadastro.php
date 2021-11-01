<?php

if (!defined('PATH')) exit; 

?>

<div class="col-12 d-flex justify-content-center flex-wrap form-cadastro">
  
  <div class="col-md-6">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">Nome completo</span>
        <input type="text" name="" id="">
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="row">
      
      <div class="col-md-3">
        <div class="input-text input-select">
          <label>
            <span class="label-text" style="margin-bottom: 20px;">Documento</span>
            <select name="" id="" doc-change>
              <option value="CPF" selected>CPF</option>
              <option value="RNE">RNE</option>
              <option value="passaporte">Passaporte</option>
            </select>
          </label>
        </div>
      </div>

      <div class="col-md-9">
        <div class="row">

          <!-- CPF -->
          <div class="col-12 active" result-doc="CPF">
            <div class="input-text mb-4">
              <label>
                <span class="label-text">CPF</span>
                <input type="text" name="" id="">
              </label>
            </div>
          </div>

          <!-- RNE -->
          <div class="col-12" result-doc="RNE">
            <div class="row">

              <div class="col-md-5">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">RNE</span>
                    <input type="text" name="" id="">
                  </label>
                </div>
              </div>

              <div class="col-md-7">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">País de Origem</span>
                    <input type="text" name="" id="">
                  </label>
                </div>
              </div>

            </div>
          </div>

          <!-- Passaporte -->
          <div class="col-12" result-doc="passaporte">
            <div class="row">

              <div class="col-md-5">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">Passaporte</span>
                    <input type="text" name="" id="">
                  </label>
                </div>
              </div>

              <div class="col-md-7">
                <div class="input-text mb-4">
                  <label>
                    <span class="label-text">País de Origem</span>
                    <input type="text" name="" id="">
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
        <input type="text" name="" id="">
      </label>
    </div>
  </div>

  <div class="col-md-3">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">Celular</span>
        <input type="text" name="" id="">
      </label>
    </div>
  </div>

  <div class="col-md-3">
    <div class="input-text mb-4">
      <label>
        <span class="label-text">Data de Nascimento</span>
        <input type="date" name="" id="">
      </label>
    </div>
  </div>

</div><!-- Form Cadastro -->
