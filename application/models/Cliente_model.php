<?php

class Cliente_model extends MY_Model {

  protected $table = 'cliente';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function listaCliente($id = null){

    if($id == null){
      // aqui lista todos os usuarios
      $result = $this->db->query("SELECT id, nome, endereco, cpf, telCel, telOut, email, sexo, datanasc, observacao, registro, status, md5(id) as hash FROM cliente;")->result_array();
    }else{
      // aqui passou o is pesquisa um unico usuário
      $result = $this->db->query("SELECT id, nome, endereco, cpf, telCel, telOut, email, sexo, datanasc, observacao, registro, status, md5(id) as hash FROM cliente WHERE id = {$id};")->result_array();

    }

      return $result;

    }



    public function post($data){

      $result = $this->db->insert($this->table, $data);
      return $result;
    }


    public function put($data){

      $this->db->where('id', $data['id']);
      $result = $this->db->update($this->table,$data);

      return $result;

    }




  }
