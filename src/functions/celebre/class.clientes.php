<?php

if (!defined('PATH')) exit;

class clientes {

  private $db_object;
  private $db;

  public $client_name;
  public $client_email;
  public $client_cpf;
  public $client_phone;
  public $client_nascimento;
  public $client_doctype;
  public $client_rne;
  public $client_passaporte;
  public $client_country_origin;
  public $client_country_origin_2;
  public $client_test_covid_date;
  public $client_test_covid_result;
  public $client_1_dose_date;
  public $client_1_dose_fabricante;
  public $client_2_dose_date;
  public $client_2_dose_fabricante;
  public $client_3_dose_date;
  public $client_3_dose_fabricante;
  public $client_event;
  public $insert_locale;

  public function __construct() {
    $this->db_object = new db;
    global $db;
    $this->db = $db;
  }

  public function set_client_name($client_name) {
    $this->client_name = $client_name;
  }

  public function set_client_email($client_email) {
    $this->client_email = $client_email;
  }

  public function set_client_cpf($client_cpf) {
    $this->client_cpf = $client_cpf;
  }

  public function set_client_phone($client_phone) {
    $this->client_phone = $client_phone;
  }

  public function set_client_nascimento($client_nascimento) {
    $this->client_nascimento = $client_nascimento;
  }

  public function set_client_doctype($client_doctype) {
    $this->client_doctype = $client_doctype;
  }

  public function set_client_rne($client_rne) {
    $this->client_rne = $client_rne;
  }

  public function set_client_passaporte($client_passaporte) {
    $this->client_passaporte = $client_passaporte;
  }

  public function set_client_country_origin($client_country_origin) {
    $this->client_country_origin = $client_country_origin;
  }

  public function set_client_country_origin_2($client_country_origin_2) {
    $this->client_country_origin_2 = $client_country_origin_2;
  }

  public function set_client_test_covid_date($client_test_covid_date) {
    $this->client_test_covid_date = $client_test_covid_date;
  }

  public function set_client_test_covid_result($client_test_covid_result) {
    $this->client_test_covid_result = $client_test_covid_result;
  }

  public function set_client_1_dose_date($client_1_dose_date) {
    $this->client_1_dose_date = $client_1_dose_date;
  }

  public function set_client_2_dose_date($client_2_dose_date) {
    $this->client_2_dose_date = $client_2_dose_date;
  }

  public function set_client_3_dose_date($client_3_dose_date) {
    $this->client_3_dose_date = $client_3_dose_date;
  }

  public function set_client_1_dose_fabricante($client_1_dose_fabricante) {
    $this->client_1_dose_fabricante = $client_1_dose_fabricante;
  }

  public function set_client_2_dose_fabricante($client_2_dose_fabricante) {
    $this->client_2_dose_fabricante = $client_2_dose_fabricante;
  }

  public function set_client_3_dose_fabricante($client_3_dose_fabricante) {
    $this->client_3_dose_fabricante = $client_3_dose_fabricante;
  }

  public function set_client_event($client_event) {
    $this->client_event = $client_event;
  }

  public function set_insert_locale($insert_locale) {
    $this->insert_locale = $insert_locale;
  }

  public function insert() {

    $insert = $this->db_object->insert('clb_clientes', [
      'client_name' => $this->client_name,
      'client_email' => $this->client_email,
      'client_cpf' => $this->client_cpf,
      'client_phone' => $this->client_phone,
      'client_nascimento' => $this->client_nascimento,
      'client_doctype' => $this->client_doctype,
      'client_rne' => $this->client_rne,
      'client_passaporte' => $this->client_passaporte,
      'client_country_origin' => $this->client_country_origin,
      'client_country_origin_2' => $this->client_country_origin_2,
      'client_test_covid_date' => $this->client_test_covid_date,
      'client_test_covid_result' => $this->client_test_covid_result,
      'client_1_dose_fabricante' => $this->client_1_dose_fabricante,
      'client_2_dose_fabricante' => $this->client_2_dose_fabricante,
      'client_3_dose_fabricante' => $this->client_3_dose_fabricante,
      'client_3_dose_date' => $this->client_3_dose_date,
      'client_2_dose_date' => $this->client_2_dose_date,
      'client_1_dose_date' => $this->client_1_dose_date,
      'client_event' => $this->client_event,
      'insert_locale' => $this->insert_locale,
      'insert_date' => date('Y-m-d H:i:s')
    ]);

    return $insert ?? false;

  }

  public function index() {
    $stmt = $this->db->prepare('SELECT * FROM clb_clientes');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  
  public function get_total() {
    $stmt = $this->db->prepare('SELECT count(*) FROM clb_clientes');
    $stmt->execute();
    return $stmt->fetchColumn();
  }

  public function get_total_testados() {
    $stmt = $this->db->prepare('SELECT count(*) FROM clb_clientes WHERE `client_test_covid_result` != "0"');
    $stmt->execute();
    return $stmt->fetchColumn();
  }

}