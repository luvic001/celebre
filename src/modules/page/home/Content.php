<?php

if (!defined('PATH')) exit;

?>


<section class="center-page homepage">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        
        <div class="logo-space">
          <a href="<?= site_url() ?>" title="Celebre: Seu evento sem Covid">
            <h1>
              <figure>
                <img src="<?= get_image('celebre-logo.png') ?>" alt="Celebre: Seu evento sem Covid">
              </figure>
            </h1>
          </a>
        </div>

        <div class="form-space">
          <p class="legend-home align-center">Acesso ao painel</p>
          <div class="box-content">
            <form>
              
              <div class="input-text mb-4">
                <label>
                  <span>E-mail</span>
                  <input type="email" name="client__email">
                </label>
              </div>

              <div class="input-text mb-5 input-password">
                <label>
                  <span>Senha</span>
                  <input type="password" name="client__password">
                  <a href="javascript:void(0);" class="password-toggle" password-toggle>
                    <i class="fas fa-eye"></i>
                  </a>
                </label>
              </div>

              <div class="input-submit">
                <button type="submit">Entrar</button>
              </div>

            </form>


          </div><!-- .box-content -->
        </div><!-- .form-space -->

        <?php /*
        <div class="lost-password-link">
          <p class="align-center">
            <a href="#" title="Esqueci minha senha">Esqueci minha senha</a>
          </p> 
        </div> */ ?>

      </div><!-- .col-lg-6.col-md-8 -->
    </div><!-- .row.justify-content-center -->
  </div><!-- .container -->

</section>