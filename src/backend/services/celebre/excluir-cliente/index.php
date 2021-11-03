<?php

if (!defined('PATH')) exit;

global $is_user_logged_in;
$is_user_logged_in = is_user_logged_in()[0];

if (!$is_user_logged_in) fjson([
  'success' => false,
  'content' => 'Você precisa estar logado para realizar esta ação'
], 400);

if (!is_admin()) fjson([
  'success' => false,
  'content' => 'Você não tem permissões para realizar esta ação'
], 400);

$client = $_POST['client'];
$client = undo_hash($client);
if (!$client) fjson([
  'success' => false,
  'content' => 'Não foi possível identificar o cliente'
], 400);

$clientes = new clientes;
$clientes->set_client_id($client);
$client = $clientes->index()[0];

if (!$client) fjson([
  'success' => false,
  'content' => 'Cliente inexistente'
], 400);

$delete = $clientes->delete();

if (!$delete) fjson([
  'success' => false,
  'content' => 'Não foi possível excluir cliente'
], 400);

ob_start();

?>
<p>O cliente <b><?= $client->client_name ?></b> foi excluído da base de dados com sucesso.</p>
<script>
  jQuery(function($){
    $('[delete-client="<?= do_hash($client->ID) ?>"]').parents().eq(1).remove();
  });
</script>
<?php

$content = ob_get_contents();
ob_end_clean();

fjson([
  'success' => true,
  'content' => $content
]);