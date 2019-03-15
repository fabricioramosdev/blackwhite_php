<?php

class Categoria_model extends MY_Model {

  protected $table = 'produto_categoria';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function listaCategoria($id = null){

    $result = $this->db->query("SELECT id, descricao, registro, status, md5(id) as hash FROM produto_categoria WHERE status = 1;")->result_array();

    return $result;

  }

  public function listaSubcategoria(){

    $result = $this->db->query("SELECT  t1.id,  t2.descricao as categoria, t1.descricao, t1.registro, t1.status, md5(t1.id) as hash FROM produto_subcategoria t1 INNER JOIN produto_categoria t2 ON t1.categoria = t2.id WHERE t1.status = 1")->result_array();

    return $result;

  }


  public function post_categoria($data){


    $result = $this->db->insert('produto_categoria', $data);
    return $result;

  }

  public function post_subcategoria($data){

    $result = $this->db->insert('produto_subcategoria', $data);
    return $result;

  }

  public function delete_categoria($data){

    $result = $this->db->delete('produto_categoria', $data);
    return $result;

  }

  public function delete_subcategoria($data){

        $result = $this->db->delete('produto_subcategoria',$data);
        return $result;

  }








}
