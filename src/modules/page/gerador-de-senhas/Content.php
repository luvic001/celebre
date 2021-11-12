<?php

if (!defined('PATH')) exit;

$is_user_logged_in = is_user_logged_in();
if (!$is_user_logged_in) die('Acesso negado');

if (!is_admin()) die('Acesso negado');

?>

<form>
  <input type="text" name="senha" id="senha" placeholder="Digite a senha">
  <input type="submit" value="Gerar">
</form>

<?php

if ($_GET['senha'])
  ___(do_hash($_GET['senha']));