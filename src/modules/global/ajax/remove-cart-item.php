<?php

if (!defined('PATH')) exit;

global $success, $response_title;

$data = $_POST['data'];
$data = undo_hash($data);
$data = unjson($data);

if (!$data) {
  $success = false;
  ___('<p>Não foi possível localizar este ítem no carrinho</p>');
}
else {
  $ID = $data->item_id / 3;
  $client_url = $data->reffer_uri;

  $carrinho = new carrinho($data->reffer_uri);
  $carrinho->remove_from_cart($ID);

  // Definindo variáveis principais
  $cart_total_count = $carrinho->get_cart_total_count();
  $cart_total_price = $carrinho->get_cart_total_price();
  $cart_content = $carrinho->get_cart();

  // Conteúdo que irá para o cart_content
  $midias = get_all_media($client_url)->content;
  $cart_content = prepare_cart_content($cart_content, $midias, $client_url);

  // Conteúdo que irá para o response
  ob_start();
  ?>

  <script>
    $.closePopup();
    jQuery('body').removeClass('page-prato-open');
    window.setTimeout(function(){
      cs_cart.update_cart_total_count(<?= $cart_total_count ?>);
      cs_cart.update_cart_total_price(`<?= $cart_total_price ?>`);
      cs_cart.update_cart_items(`<?= $cart_content ?>`);
    }, 500);
  </script>

  <?php
  $content = ob_get_contents();
  ob_end_clean();

  fjson([
    'success' => true,
    'content' => $content
  ]);

}