<?php

class Crediario_model extends MY_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }


  public function lista_cliente_crediario()
  {
    $result = $this->db->query("SELECT distinct t1.id, t1.nome, t1.endereco, t1.cpf, t1.telCel, t1.whatsapp, t1.telOut, t1.email, t1.sexo, date_format(t1.datanasc,'%d/%m/%Y') as datanasc, t1.observacao, t1.registro, t1.status, md5(t1.id) as hash
    FROM cliente t1
    INNER JOIN venda t2 ON t1.id = t2.cliente_id AND t2.pagamento_id = 4
    INNER JOIN venda_prazo t3 ON t3.cliente_id = t1.id AND t3.status = 1 ;")->result_array();

    foreach ($result as &$item) {
      $item["atraso"] = $this->check_vendas_atradas_cliente($item['id']);
    }

    return $result;
  }





  public function lista_parcelas_cliente_crediario($data)
  {

    $result = $this->db->query("SELECT A.id,B.id as venda, A.parcela, date_format(A.data_parcela,'%d/%m/%Y') as data_parcela  , A.valor_parcela, A.status, IF(A.data_parcela < current_date(),1, null) as atraso, B.registro, B.cliente_nome
    FROM  venda_prazo A
    INNER JOIN venda B ON A.venda_id = B.id
    WHERE  A.cliente_id = {$data} AND A.status = 1 ORDER BY B.id,A.data_parcela")->result_array();
    return $result;
  }



  public function check_vendas_atradas_cliente($id)
  {
    $result = $this->db->query("SELECT  IF(data_parcela < current_date(),1, null) as vencida
    FROM venda_prazo WHERE data_parcela < current_date() AND cliente_id = {$id} AND status = 1;")->result_array();
    return $result;
  }

  public function plus_itens_venda_crediario($id)
  {
    $result = $this->db->query("SELECT id, produto_id, produto_codigo, produto_descricao, produto_preco_venda, produto_quantidade, venda_id, md5(id) as hash
FROM venda_itens WHERE venda_id = {$id};")->result_array();
    return $result;
  }


  public function  pagar_parcela_crediario($id)
  {

    $this->db->query("UPDATE venda_prazo SET status = 0, data_pagamento = current_date(), usuario_id = {$this->session->usuario[0]['id']} WHERE id = {$id};");
    return true;
  }


  public function resumo_cliente_crediario($id)
  {

    $result = $this->db->query("SELECT
      sum(valor_parcela) as total_parcelado, null as atraso
      FROM venda_prazo WHERE cliente_id = {$id} and status = 1
      union all
      SELECT
      sum(valor_parcela) as total_parcelado,data_parcela < current_date() as atraso
      FROM venda_prazo WHERE cliente_id = {$id} and status = 1 group by data_parcela < current_date() ;")->result_array();

    return $result;
  }

  public function lista_atraso_crediario()
  {

    $result = $this->db->query("SELECT t1.parcela, date_format(t1.data_parcela, '%d/%m/%Y') as data_parcela,t1.valor_parcela,t2.nome, t2.whatsapp, t2.telCel,t2.telOut,t1.venda_id FROM venda_prazo t1
INNER JOIN cliente t2 ON t1.cliente_id = t2.id
WHERE t1.status = 1 AND t1.data_parcela < current_date()
ORDER BY t1.data_parcela ;")->result_array();
    return $result;
  }



  public function parcelas_vendas($venda)
  {

    $result = $this->db->query("SELECT * FROM venda_prazo where venda_id = '{$venda}' ;")->result_array();
    return $result;
  }


  public function reducao_parcela_completo($data){

    $this->db->where("id", $data["id"]);
    $result = $this->db->update("venda_prazo",array("data_pagamento"=>date('Y-m-d H:i:s'),"status"=>0));
    return $result;
  }

public function reducao_parcela_parcial($data){

  $this->db->where("id", $data["id"]);
  $result = $this->db->update("venda_prazo",array("valor_parcela"=>$data['valor_parcela']));

}

}
