<?php

class Produto_model extends MY_Model {

  protected $table = 'produto';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function listaProduto($id = null){

    if($id == null){
      // aqui lista todos os produtos
      $result = $this->db->query("SELECT id, categoria, codigo, descricao, detalhe, preco_venda, preco_custo, estoque_saldo, estoque_minimo, status, registro, md5(id) as hash FROM produto;")->result_array();
    }else{
      // aqui passou o is pesquisa um unico produto
      $result = $this->db->query("SELECT id, categoria, codigo, descricao, detalhe, preco_venda, preco_custo, estoque_saldo, estoque_minimo, status, registro, md5(id) as hash FROM produto WHERE id = {$id};")->result_array();

    }

      return $result;

    }


    public function post($data){
      $result = $this->db->insert($this->table, $data);

      if($result){
        return    $this->db->insert_id();
      }

    }


    public function put($data){

      $this->db->where('id', $data['id']);
      $result = $this->db->update($this->table,$data);

      return $result;

    }


    public function checkcodigo($data){

    	if(!isset($data['id'])){
            // não passa o id esta inserindo o produto
            $result = $this->db->query("SELECT id, codigo, descricao FROM produto WHERE codigo = '{$data['codigo']}';")->result_array();
        }else{
            //passa  o id tem que verificar se outro produto não esta usando o mesmo codigo por isso id !=
            $result = $this->db->query("SELECT id, codigo, descricao FROM produto WHERE codigo = '{$data['codigo']}' AND id != '{$data['id']}' ;")->result_array();
        }
        return $result;
    }



  }
