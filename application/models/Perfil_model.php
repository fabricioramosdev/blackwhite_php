<?php

class Perfil_model extends MY_Model {

    protected $table = 'perfil';
    protected $PK = 'id';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    // listas os perfils exception root
    public function listaPerfil(){
      $result = $this->db->query("SELECT  id, descricao, registro, status, md5(id) as hash  FROM perfil WHERE status = 1  AND id != 1;")->result_array();
          return $result;
    }
}
