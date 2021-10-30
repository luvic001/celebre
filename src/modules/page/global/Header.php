<?php

if (!defined('PATH')) exit;

?>

<header class="site-header">

  <h1 class="align-center">
    <figure>
      <img src="<?= get_image('celebre-logo-branco.png') ?>" alt="Celebre">
    </figure>
  </h1>

</header>

<section class="user-bar">
  <div class="container">
    <div class="box-content d-flex justify-content-between">
      <div class="user-name">
        <p>Olá, [nome de usuário]!</p>
      </div>
      <div class="logout-button">
        <a href="#">
          <span>Sair</span>
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </div>
  </div>
</section>