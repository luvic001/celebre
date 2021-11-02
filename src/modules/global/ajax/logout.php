<?php

if (!defined('PATH')) exit;

global $success, $response_title, $code;

$success = true;
$response_title = 'Desconectado com sucesso';
$code = 200;

$cookie_name = 'clb_logged_in';
$cookie = new cookie;

$cookie->destroy($cookie_name);

?>
<p>Você foi desconectado com sucesso.</p>
<script>
  window.location.assign('<?= site_url() ?>');
</script>