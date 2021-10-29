<?php

if (!defined('PATH')) exit;
getCurStyleSheet('Popup', 'global');
getCurScript('Popup', 'global');

?>
<section class="popup-site">

  <div class="glass" close-popup=""></div>
  <div class="content">
    <div class="head">
      <h3></h3>
      <a class="close-button" href="#" close-popup=""><?= svg('close') ?></a>
    </div>
    <div class="response-content"></div>
  </div>

</section>