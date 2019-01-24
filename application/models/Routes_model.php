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

    public function RouteLiberaRoot($data){


      $result = $this->db->insert($this->table, array("controller"=> $data['controller'],
      "method"=>$data['method'],
      "aside"=> 0));

      if($result){
        $routes = $this->db->insert_id();

        $result = $this->db->insert('perfil_acessa_routes', array(
          "perfil"=> $data['perfil'],
          "routes"=>$routes));
        }

        return $result;


      }


      public function liberaPerfilAdmin(){

        $this->db->query('DELETE FROM  perfil_acessa_routes WHERE perfil = 2;');
        $this->db->query('INSERT perfil_acessa_routes(perfil, routes) SELECT B.id as perfil,A.id  as routes FROM routes A, perfil B WHERE B.id = 2;');

      }

    }
