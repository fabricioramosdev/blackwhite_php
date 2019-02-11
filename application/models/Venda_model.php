<?php

class Venda_model extends MY_Model {


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

  public function search_produto($data){
    $result = $this->db->query("SELECT id as value, categoria, codigo, descricao as label, detalhe, preco_venda, preco_custo, estoque_saldo, estoque_minimo, status, registro, md5(id) as hash FROM produto WHERE codigo LIKE  '%{$data}%'  OR  descricao LIKE '%{$data}%' AND status = 1 AND estoque_saldo > 0;")->result_array();
    return $result;
  }


}
