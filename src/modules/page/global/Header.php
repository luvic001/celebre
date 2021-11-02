<?php

if (!defined('PATH')) exit;
global $is_user_logged_in;

?>

<header class="site-header">

  <h1 class="align-center">
    <figure>
      <img src="<?= get_image('celebre-logo-branco.png') ?>" alt="Celebre">
    </figure>
  </h1>

</header>

<?php if ($is_user_logged_in): ?>

<section class="user-bar">
  <div class="container-fluid">
    <div class="box-content d-flex justify-content-between">
      <div class="user-name">
        <p>Olá, <?= explode(' ', $is_user_logged_in['user_nicename'])[0] ?>!</p>
      </div>
      <div class="logout-button">
        <a href="logout" ajax-link title="Sair">
          <span>Sair</span>
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>