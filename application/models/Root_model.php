<?php

class Root_model extends MY_Model {


  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }


      public function listaUsuarioRoot(){
        $result = $this->db->query("SELECT id, fkperfil, nome, avatar, email, senha, registro, status, md5(id) as hash FROM usuario WHERE fkperfil = 1;")->result_array();
        return $result;
      }

      public function listaRoutes(){

        $result = $this->db->query("  SELECT id, label, controller, method, aside, status, registro, md5(id) as hash FROM routes;")->result_array();
        return $result;


      }


      public function listaPerfil(){

        $result = $this->db->query("SELECT  id, descricao, registro, status, md5(id) as hash FROM perfil")->result_array();
        return $result;

      }



      public function post($data){

        $result = $this->db->insert($this->table, array("nome"=> $data['nome'],
        "email"=>$data['email'],
        "senha"=> md5($data['senha']),
        "fkperfil"=>$data['perfil']));

        if($result){
          return    $this->db->insert_id();
        }

      }

      public function putprofile($data){
        $this->db->where('id', $data['id']);
        $result = $this->db->update('usuario',$data);
        return $result;
      }

      public function postLiberarAcesso($data){
        $this->deletarAcesso($data);
        $result = $this->db->insert('perfil_acessa_routes', $data);

      }

      public function deletarAcesso($data){
        $this->db->where('perfil', $data['perfil']);
        $this->db->where('routes', $data['routes']);
        $this->db->delete('perfil_acessa_routes', $data);

      }


      public function clonarAcesso($data){

        $this->db->query("DELETE FROM  perfil_acessa_routes WHERE perfil = '{$data['to']}' ;");
        $this->db->query("INSERT perfil_acessa_routes(perfil, routes) SELECT '{$data['to']}',routes FROM bwdev.perfil_acessa_routes WHERE perfil = '{$data['in']}'  ;");

      }

      public function perfilListaAcessos(){

                $result = $this->db->query("SELECT A.descricao  as perfil,  concat(B.perfil,'-',B.routes) pid , C.label,C.controller,C.method , C.aside FROM perfil A INNER JOIN perfil_acessa_routes B ON A.id = B.perfil INNER JOIN routes C ON B.routes = C.id")->result_array();
                return $result;
      }




    }
