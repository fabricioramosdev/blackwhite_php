<?php

class Produto_categoria_model extends MY_Model {

  protected $table = 'produto_categoria';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function listaCategoria($id = null){

    $result = $this->db->query("SELECT id, descricao, registro, status, md5(id) as hash FROM produto_categoria WHERE status = 1;")->result_array();

    foreach ($result as &$item) {
      $item ["subcat"] = $this->listaSubcategoria($item ['id']);
    }
    return $result;

  }

  public function listaSubcategoria($data){

    $result = $this->db->query("SELECT id, categoria, descricao, registro, status, md5(id) as hash FROM produto_subcategoria WHERE status = 1 AND  categoria = '{$data}';")->result_array();

    return $result;

  }


  


}
