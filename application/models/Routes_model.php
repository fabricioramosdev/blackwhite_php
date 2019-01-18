<?php

class Routes_model extends MY_Model {

    protected $table = 'routes';
    protected $PK = 'id';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function check($data){
      $result = $this->db->query("SELECT A.id, A.controller, A.method, A.aside  FROM routes A
      INNER JOIN perfil_acessa_routes B ON A.id = B.routes
      WHERE A.status = 1 AND B.status = 1
      AND A.controller = '{$data['controller']}'
      AND A.method = '{$data['method']}'
      AND B.perfil = '{$data['perfil']}'; ")->result_array();
      return $result;
    }


}