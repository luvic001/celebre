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
  public $insert_colaborador;

  public $client_id;
  public $pagination;
  public $limit;
  public $current_page;
  public $total_current_query;

  public function __construct() {
    $this->db_object = new db;
    global $db;
    $this->db = $db;
    self::set_pagination();
    self::set_limit();
  }

  public function set_client_id($client_id) {
    $this->client_id = $client_id;
  }

  public function get_client_id() {
    return $this->client_id;
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

  public function set_insert_colaborador($insert_colaborador) {
    $this->insert_colaborador = $insert_colaborador;
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
      // 'client_test_covid_date' => $this->client_test_covid_date,
      // 'client_test_covid_result' => $this->client_test_covid_result,
      'client_1_dose_fabricante' => $this->client_1_dose_fabricante,
      'client_2_dose_fabricante' => $this->client_2_dose_fabricante,
      'client_3_dose_fabricante' => $this->client_3_dose_fabricante,
      'client_3_dose_date' => $this->client_3_dose_date,
      'client_2_dose_date' => $this->client_2_dose_date,
      'client_1_dose_date' => $this->client_1_dose_date,
      'client_event' => $this->client_event,
      'insert_locale' => $this->insert_locale,
      'insert_date' => date('Y-m-d H:i:s'),
      'insert_colaborador' => $this->insert_colaborador
    ]);

    return $insert ?? false;

  }

  public function update() {
    $update = $this->db_object->update('clb_clientes', [
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
      // 'client_test_covid_date' => $this->client_test_covid_date,
      // 'client_test_covid_result' => $this->client_test_covid_result,
      'client_1_dose_fabricante' => $this->client_1_dose_fabricante,
      'client_2_dose_fabricante' => $this->client_2_dose_fabricante,
      'client_3_dose_fabricante' => $this->client_3_dose_fabricante,
      'client_3_dose_date' => $this->client_3_dose_date,
      'client_2_dose_date' => $this->client_2_dose_date,
      'client_1_dose_date' => $this->client_1_dose_date,
      'client_event' => $this->client_event,
      'insert_colaborador' => $this->insert_colaborador,
    ], [
      'fields' => [
        'ID' => self::get_client_id()
      ]
    ]);

    return $update ?? false;

  }

  public function delete() {

    if (!self::get_client_id()) return false;
    $stmt = $this->db_object->delete('clb_clientes', [
      'ID' => self::get_client_id()
    ]);
    
    if (!$stmt) return false;

    return true;

  }

  public function set_pagination($pagination = 1) {
    $this->current_page = $pagination;
    $pagination = (($this->limit * $pagination) ) - $this->limit;
    $this->pagination = $pagination;
  }

  public function get_current_page() {
    return $this->current_page;
  }

  public function set_limit($limit = 15) {
    $this->limit = $limit;
  }

  public function get_pagination() {
    return $this->pagination;
  }

  public function get_limit() {
    return $this->limit;
  }

  public function get_max_pagination() {
    return ceil(self::get_current_total_query() / $this->get_limit());
  }

  public function get_current_total_query() {
    return $this->total_current_query;
  }
  
  public function index() {

    if (self::get_client_id()) {
      $sql = 'SELECT * FROM clb_clientes WHERE ID = :ID';
      $args['ID'] = self::get_client_id();
    }
    else {

      if (is_promotor()) {

        global $is_user_logged_in;
        $ID_promotor = '"'.only_number($is_user_logged_in['ID']).'"';
        
        $sql = sprintf(
          "SELECT * FROM clb_clientes WHERE (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true) ORDER BY ID DESC LIMIT %d, %d", 
          self::get_pagination(),
          self::get_limit()
        );

        
        $sql_total_rows = "SELECT count(*) FROM clb_clientes WHERE (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true)";
      }
      else {
        $sql = sprintf(
          'SELECT * FROM clb_clientes ORDER BY ID DESC LIMIT %d, %d', 
          self::get_pagination(),
          self::get_limit()
        );
        
        $sql_total_rows = 'SELECT count(*) FROM clb_clientes';
      }

      $stmt_total_rows = $this->db->prepare($sql_total_rows);
      $stmt_total_rows->execute();
      $this->total_current_query = $stmt_total_rows->fetchColumn();

    }

    $stmt = $this->db->prepare($sql);
    $stmt->execute($args ?? null);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function index_by_date($data_inicial, $data_final) {

    global $is_user_logged_in;
    $ID_promotor = '"'.only_number($is_user_logged_in['ID']).'"';

    if (is_promotor()) {
      $sql = sprintf(
        "SELECT * FROM clb_clientes WHERE 
        (
          (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true) AND
          ( `insert_date` BETWEEN :data_inicial AND :data_final) 
        )
        
        ORDER BY ID DESC LIMIT %d, %d", 
        self::get_pagination(),
        self::get_limit()
      );
      
    }
    else {
      $sql = sprintf(
        'SELECT * FROM clb_clientes WHERE `client_test_covid_date` BETWEEN :data_inicial AND :data_final ORDER BY ID DESC LIMIT %d, %d', 
        self::get_pagination(),
        self::get_limit()
      );
    }
    
    $args = [
      'data_inicial' => $data_inicial,
      'data_final' => $data_final
    ];

    if (is_promotor()) {
      $sql_total_rows = "SELECT count(*) FROM clb_clientes WHERE 
      (
        (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true) AND
        ( `client_test_covid_date` BETWEEN :data_inicial AND :data_final)
      )";
    }
    else {
      $sql_total_rows = 'SELECT count(*) FROM clb_clientes WHERE `client_test_covid_date` BETWEEN :data_inicial AND :data_final';
    }
    

    $stmt_total_rows = $this->db->prepare($sql_total_rows);
    $stmt_total_rows->execute($args);
    $this->total_current_query = $stmt_total_rows->fetchColumn();

    $stmt = $this->db->prepare($sql);
    $stmt->execute($args ?? null);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function index_by_term($term, $search_all = false) {
    
    global $is_user_logged_in;
    $ID_promotor = '"'.only_number($is_user_logged_in['ID']).'"';

    if (is_promotor() and !$search_all) {
      $sql = sprintf(
        "SELECT * FROM clb_clientes 
          WHERE 
            ((JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true) AND
            (
              (`client_name` LIKE :search_term) OR 
              (`client_email` LIKE :search_term) OR
              (`client_cpf` LIKE :search_term) OR
              (`client_phone` LIKE :search_term) OR
              (`client_rne` LIKE :search_term) OR
              (`client_passaporte` LIKE :search_term)
            ))
          ORDER BY ID DESC LIMIT %d, %d", 
        self::get_pagination(),
        self::get_limit()
      );
    }

    else {
      $sql = sprintf(
        'SELECT * FROM clb_clientes 
          WHERE (
            (`client_name` LIKE :search_term) OR 
            (`client_email` LIKE :search_term) OR
            (`client_cpf` LIKE :search_term) OR
            (`client_phone` LIKE :search_term) OR
            (`client_rne` LIKE :search_term) OR
            (`client_passaporte` LIKE :search_term)
          ) 
          ORDER BY ID DESC LIMIT %d, %d', 
        self::get_pagination(),
        self::get_limit()
      );
    }
    
    $args = [
      'search_term' => '%'.$term.'%',
    ];
    
    if (is_promotor() and !$search_all){
      $sql_total_rows = 'SELECT count(*) FROM clb_clientes 
       WHERE (
        `client_name` LIKE :search_term OR 
        `client_email` LIKE :search_term OR
        `client_cpf` LIKE :search_term OR
        `client_phone` LIKE :search_term OR
        `client_rne` LIKE :search_term OR
        `client_passaporte` LIKE :search_term
        )
      ';
    }

    else {
      
      $sql_total_rows = "SELECT count(*) FROM clb_clientes 
       WHERE 
        (
          (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true) AND
        (
          `client_name` LIKE :search_term OR 
          `client_email` LIKE :search_term OR
          `client_cpf` LIKE :search_term OR
          `client_phone` LIKE :search_term OR
          `client_rne` LIKE :search_term OR
          `client_passaporte` LIKE :search_term
          )
        )
      ";
    }
    $stmt_total_rows = $this->db->prepare($sql_total_rows);
    $stmt_total_rows->execute($args);
    $this->total_current_query = $stmt_total_rows->fetchColumn();

    $stmt = $this->db->prepare($sql);
    $stmt->execute($args ?? null);

    return $stmt->fetchAll(PDO::FETCH_OBJ);

  }
  
  public function get_total() {
    
    global $is_user_logged_in;
    $ID_promotor = '"'.only_number($is_user_logged_in['ID']).'"';

    if (is_promotor()) {
      $sql = "SELECT count(*) FROM clb_clientes WHERE (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true)";
    }
    else {
      $sql = 'SELECT count(*) FROM clb_clientes';
    }

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
  }

  public function get_total_testados() {

    if (is_promotor()) {
      
      global $is_user_logged_in;
      $ID_promotor = '"'.only_number($is_user_logged_in['ID']).'"';

      $sql = "SELECT count(*) FROM clb_clientes WHERE
      (
        (JSON_EXTRACT(insert_colaborador, '$.".$ID_promotor."') = true) AND 
        `client_test_covid_result` != '0'
      )
      ";
    }
    else {
      $sql = 'SELECT count(*) FROM clb_clientes WHERE `client_test_covid_result` != "0"';
    }
    
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
  }

}