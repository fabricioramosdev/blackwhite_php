<?php

class Login_model extends CI_Model {

    protected $table = 'usuario';
    protected $PK = 'id';

    public function __construct() {
        parent::__construct();
           $this->load->library('session');
    }

    public function check($data){
      $result = $this->db->query("SELECT id, nome, avatar, email, senha, registro, status FROM usuario WHERE email= '{$data['email']}' AND senha = md5('{$data['senha']}') AND status = 1;")->result_array();
      return $result;
    }
}
