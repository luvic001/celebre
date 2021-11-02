<?php

if (!defined('PATH')) exit;

$login = login($_POST['client__email'], $_POST['client__password']);

// Success message
ob_start();
?>

<p>Login efetuado com sucesso</p>

<script>
  window.location.assign('<?= site_url() ?>/painel');
</script>

<?php
$content_success = ob_get_contents();
ob_end_clean();

fjson([
  'success' => $login ?? false,
  'content' => (bool) $login ? $content_success : 'E-mail ou senha incorretos'
], (bool) $login ? 200: 400);