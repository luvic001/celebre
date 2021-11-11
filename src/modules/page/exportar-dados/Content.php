<?php

if (!defined('PATH')) exit;

$is_user_logged_in = is_user_logged_in();
if (!$is_user_logged_in) die('Acesso negado');

global $db;

if (is_promotor()) {
  $ID_promotor = only_number($is_user_logged_in[0]['ID']);
  $sql = 'SELECT * FROM clb_clientes WHERE (JSON_EXTRACT(insert_colaborador, "$.'.$ID_promotor.'") = "true") ORDER BY ID DESC';
}
else {
  $sql = 'SELECT * FROM clb_clientes ORDER BY ID DESC';
}
$stmt = $db->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);

$eventos = get_eventos();
$vacina = get_vacinas();

$li_export[] = [
  'NOME',
  'EMAIL',
  'TELEFONE',
  'DATA_DE_NASCIMENTO',
  'TIPO_DE_DOCUMENTO',
  'CPF',
  'RNE',
  'RNE_PAIS_DE_ORIGEM',
  'PASSAPORTE',
  'PASSAPORTE_PAIS_DE_ORIGEM',
  'DATA_DO_TESTE_DE_COVID',
  'RESULTADO_DO_TESTE_DE_COVID',
  'VACINA_1_DOSE_DATA',
  'VACINA_1_DOSE_FABRICANTE',
  'VACINA_2_DOSE_DATA',
  'VACINA_2_DOSE_FABRICANTE',
  'VACINA_3_DOSE_DATA',
  'VACINA_3_DOSE_FABRICANTE',
];

foreach ($eventos as $ID => $evento) {
  $li_export[0][] = $evento;
  $li_export[0][] = 'DATA PULSEIRA INGRESSO - ' . $evento;
}

$tipo_de_documento = [
  '1' => 'CPF',
  '2' => 'RNE',
  '3' => 'Passaporte'
];

$resultado = [
  '1' => 'Reagente',
  '2' => 'Nao reagente'
];

$key = 1;

foreach ($clientes as $client) {
  
  $li_export[$key] = [
    $client->client_name,
    $client->client_email,
    telefone($client->client_phone),
    ttime($client->client_nascimento, '%d/%m/%Y'),
    $tipo_de_documento[$client->client_doctype],
    $client->client_cpf ? cpf($client->client_cpf) : '',
    $client->client_rne ?? '',
    $client->client_country_origin ?? '',
    $client->client_passaporte ?? '',
    $client->client_country_origin_2 ?? '',
    isset_date($client->client_test_covid_date) ? ttime($client->client_test_covid_date, '%d/%m/%Y %H:%M') : '',
    $resultado[$client->client_test_covid_result] ?? '',
    isset_date($client->client_1_dose_date) ? ttime($client->client_1_dose_date, '%d/%m/%Y') : '',
    $vacina[$client->client_1_dose_fabricante] ?? '',
    isset_date($client->client_2_dose_date) ? ttime($client->client_2_dose_date, '%d/%m/%Y') : '',
    $vacina[$client->client_2_dose_fabricante] ?? '',
    isset_date($client->client_3_dose_date) ? ttime($client->client_3_dose_date, '%d/%m/%Y') : '',
    $vacina[$client->client_3_dose_fabricante] ?? ''
  ];

  $evnt = unjson($client->client_event);

  foreach ($eventos as $ID_evento => $evento) {
    $li_export[$key][] = $evnt->{$ID_evento}->ingress ? 'SIM' : 'NAO';
    $li_export[$key][] = isset_date($evnt->{$ID_evento}->date) ? ttime($evnt->{$ID_evento}->date, '%d/%m/%Y %H:%M') : '-';
  }

  $key++;

}

// $li_export[] = [
//   
//   'CEP',
//   'BAIRRO',
//   'CIDADE',
//   'UF',
//   'NUMERO_ENDERECO',
//   'DDD_CIDADE',
//   'DATA'
// ];

// foreach ($list as $li) {
//   $li_export[] = [
//     $li->client_name ?? '',
//     cpf($li->client_cpf) ?? '',
//     $li->client_email ?? '',
//     only_number($li->client_phone),
//     only_number($li->client_cep),
//     $li->client_neighborhood,
//     $li->client_city,
//     $li->client_uf,
//     $li->client_number,
//     $li->client_ddd,
//     $li->INSERT_DATE,
//   ];
// }

download_file_via_header('export-'.$export_name.'-'.date('Y-m-d.H.i.s').'.csv');
// // ___(put_in_csv_from_array(to_array($li_export)));

foreach ($li_export as $item) {
  
  foreach ($item as $it) {
    echo $it . ';';
  }

  echo "\n";

}


die();