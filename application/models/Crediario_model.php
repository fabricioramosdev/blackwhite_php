<?php

class Crediario_model extends MY_Model {

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }



  public function busca_crediario($data){

    $result = $this->db->query("SELECT A.id,B.id as venda, A.parcela, A.data_parcela, A.valor_parcela, A.status, B.registro
 FROM  venda_prazo A
 INNER JOIN venda B ON A.venda_id = B.id
 WHERE A.status = 1 AND  A.cliente_id = {$data['id']} ORDER BY B.id,A.data_parcela")->result_array();
    return $result;

  }



  //
  // public function put($data){
  //
  //   $this->db->where('id', $data['id']);
  //   $result = $this->db->update($this->table,$data);
  //
  //   return $result;
  //
  // }




}
