<?php

if (!defined('PATH')) exit;

global $routes;

$data = $_POST['data'];
$data = unjson(undo_hash($data));

if (!$data) fjson([
  'success' => false,
  'content' => 'Não foi possível identificar seu prato'
], 400);

$cardapio = $routes->{$data->client_url}->CS_DATA;
if (!cs_is_gold($cardapio)) fjson([
  'success' => false,
  'content' => 'Em seu plano esta função não está contemplada <br> <a href="mailto:bruno@agenciacampana.com.br">Assine a versão gold!</a>'
], 400);

$ID = $data->ID / 3;

$carrinho = new carrinho($data->client_url);
$carrinho->add_to_cart($ID, 1);

// Definindo variáveis principais
$cart_total_count = $carrinho->get_cart_total_count();
$cart_total_price = $carrinho->get_cart_total_price();
$cart_content = $carrinho->get_cart();

// Conteúdo que irá para o cart_content
$midias = get_all_media($data->client_url)->content;
$cart_content = prepare_cart_content($cart_content, $midias, $data->client_url);

?>

<script>
  $.closePopup();
  window.setTimeout(function(){
    cs_cart.update_cart_total_count(<?= $cart_total_count ?>);
    cs_cart.update_cart_total_price(`<?= $cart_total_price ?>`);
    cs_cart.update_cart_items(`<?= $cart_content ?>`);
  }, 500);
</script>
