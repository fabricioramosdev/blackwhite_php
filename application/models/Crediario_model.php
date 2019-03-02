<?php

class Crediario_model extends MY_Model {

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }


  public function lista_cliente_crediario(){
    $result = $this->db->query("SELECT distinct t1.id, t1.nome, t1.endereco, t1.cpf, t1.telCel, t1.whatsapp, t1.telOut, t1.email, t1.sexo, date_format(t1.datanasc,'%d/%m/%Y') as datanasc, t1.observacao, t1.registro, t1.status, md5(t1.id) as hash
    FROM cliente t1
    INNER JOIN venda t2 ON t1.id = t2.cliente_id AND t2.pagamento_id = 4
    INNER JOIN venda_prazo t3 ON t3.cliente_id = t1.id AND t3.status = 1 ;")->result_array();
    return $result;
  }


  public function lista_parcelas_cliente_crediario($data){

    $result = $this->db->query("SELECT A.id,concat('Venda: N°',B.id) as venda, A.parcela, date_format(A.data_parcela,'%d/%m/%Y') as data_parcela  , A.valor_parcela, A.status, B.registro, B.cliente_nome
    FROM  venda_prazo A
    INNER JOIN venda B ON A.venda_id = B.id
    WHERE  A.cliente_id = {$data} ORDER BY B.id,A.data_parcela")->result_array();
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

  //  public function busca_crediario($data){
  //
  //    $result = $this->db->query("SELECT A.id,B.id as venda, A.parcela, A.data_parcela, A.valor_parcela, A.status, B.registro
  // FROM  venda_prazo A
  // INNER JOIN venda B ON A.venda_id = B.id
  // WHERE A.status = 1 AND  A.cliente_id = {$data['id']} ORDER BY B.id,A.data_parcela")->result_array();
  //    return $result;
  //
  //  }





}
