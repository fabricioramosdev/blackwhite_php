<?php

class Usuario_model extends MY_Model {

  protected $table = 'usuario';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function listaUsuario($id = null){

    if($id == null){
      // aqui lista todos os usuarios
      $result = $this->db->query("SELECT A.id, A.fkperfil, A.nome, A.avatar, A.email,  A.registro, A.status, B.descricao
        FROM usuario A INNER JOIN perfil B ON A.fkperfil = B.id WHERE A.fkperfil != 1")->result_array();
      }else{
        // aqui passou o is pesquisa um unico usuário
        $result = $this->db->query("SELECT A.id, A.fkperfil, A.nome, A.avatar, A.email,  A.registro, A.status, B.descricao
          FROM usuario A INNER JOIN perfil B ON A.fkperfil = B.id WHERE A.fkperfil != 1 AND A.id = {$id};")->result_array();

        }

        foreach ($result as &$item) {
          $item ["lojas"] = $this->listaLojasUsuario($item ['id']);
        }
        return $result;

      }

      public function listaLojasUsuario($data){
        $result = $this->db->query("SELECT B.id, B.descricao FROM usuario_acessa_loja A INNER JOIN loja B ON A.loja = B.id WHERE B.status = 1 AND  A.usuario = '{$data}';")->result_array();
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


      public function put($data){

        $this->db->where('id', $data['id']);
        $result = $this->db->update($this->table,$data);

        return $result;

      }




    }
