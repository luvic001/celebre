<?php

if (!defined('PATH')) exit;

$tipos_de_servico = [
  'take-away' => sprintf('%s Retirar na loja', svg('take-away')),
  'delivery' => sprintf('%s Delivery', svg('delivery')),
  'no-local' => sprintf('%s No local', svg('restaurantes'))
];
$tipo_de_servico = unjson(
  undo_hash($_POST['data'])
);

if (!$tipos_de_servico[$tipo_de_servico->service]) fjson([
  'success' => false,
  'content' => 'Ocorreu um erro. Tente novamente mais tarde.'
], 400);

$carrinho = new carrinho($tipo_de_servico->reffer_uri);
$current_cart = $carrinho->get_cart();

ob_start();

get_modules('Dados-pessoais/Form-start', 'page/frontend/Page', [
  'tipo_de_servico' => $tipo_de_servico,
  'tipos_de_servico' => $tipos_de_servico,
  'tipo_de_servico_label' => $tipos_de_servico[$tipo_de_servico->service],
  'current_cart' => $current_cart,
  'carrinho' => $carrinho
]);
get_modules('Dados-pessoais/Form-end', 'page/frontend/Page', [
  'current_cart' => $current_cart,
  'carrinho' => $carrinho
]);

$content = ob_get_contents();
ob_end_clean();

?>

<script>
  jQuery('body').addClass('page-dados-open');
  $.closePopup();
  $.write_in_div('[page-dados]', `<?= $content ?>`);
</script>