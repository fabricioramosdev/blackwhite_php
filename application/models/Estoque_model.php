<?php

class Estoque_model extends MY_Model {

  protected $table = 'estoque';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }


  public function put($data){

    $this->db->where('id', $data['id']);
    $result = $this->db->update('produto',$data);

    return $result;
  }

  public function inputProdutoEstoque($data){

    $result = $this->db->insert($this->table, $data);
    return $result;
  }

  private function AjustaSaldoProduto($data){


  }


}
