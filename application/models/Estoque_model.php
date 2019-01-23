<?php

class Estoque_model extends MY_Model {

  protected $table = 'estoque';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

// public function listaProduto($id = null){
//
//   if($id == null){
//     // aqui lista todos os produtos
//     $result = $this->db->query("SELECT id, descricao, detalhe, preco_venda, preco_custo, estoque_ini, estoque_now, estoque_min, status,  registro, md5(id) as hash FROM produto;")->result_array();
//   }else{
//     // aqui passou o is pesquisa um unico produto
//     $result = $this->db->query("SELECT id, descricao, detalhe, preco_venda, preco_custo, estoque_ini, estoque_now, estoque_min, status, registro, md5(id) as hash FROM produto WHERE id = {$id};")->result_array();
//
//   }
//
//     return $result;
//
//   }
//
//
//   public function post($data){
//     $result = $this->db->insert($this->table, $data);
//
//     if($result){
//       return    $this->db->insert_id();
//     }
//
//   }
//
//
//   public function put($data){
//
//     $this->db->where('id', $data['id']);
//     $result = $this->db->update($this->table,$data);
//
//     return $result;
//
//   }


    public function inputProdutoEstoque($data){

          $result = $this->db->insert($this->table, $data);
          return $result;


    }


    private function AjustaSaldoProduto($data){


    }



  }
