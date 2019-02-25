<?php

class App_model extends MY_Model {


  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }


  public function vendas_mes(){

    $result = $this->db->query("SELECT sum(venda_total) as vendas_mes FROM venda WHERE date_format(registro,'%m%Y') = date_format(now(),'%m%Y') ;")->result_array();
    return $result;

  }

  public function vendas_semana(){


      $result = $this->db->query("SELECT sum(venda_total) as vendas_semana, WEEK(now())+1 as semana FROM venda WHERE WEEK(registro) = WEEK(now()) ;")->result_array();
      return $result;

  }


public function vendas_atradas(){
  $result = $this->db->query("SELECT sum( valor_parcela) as total_vencida  FROM venda_prazo WHERE data_parcela < current_date() AND status = 1;")->result_array();
  return $result;
}


public function chart_faturamento_mensal(){

  $result = $this->db->query("SELECT sum( venda_total)  as a,  date_format(registro,'%m/%y')  as y  FROM venda WHERE date_format(registro,'%Y') =  date_format(now(),'%Y')  GROUP BY   date_format(registro,'%m') ORDER BY y")->result_array();
  return $result;

}


public function chart_vendas_forma_pagamento(){

  $result = $this->db->query("SELECT pagamento_descricao  as label , format(count(1) / total.cnt*100,2) as value
FROM  venda
CROSS
  JOIN (SELECT COUNT(1) AS cnt FROM venda cnt WHERE pagamento_id is not null
AND date_format(registro,'%Y') =  date_format(now(),'%Y')  ) total
WHERE pagamento_id is not null
AND date_format(registro,'%Y') =  date_format(now(),'%Y')
GROUP BY pagamento_id;")->result_array();
  return $result;

}

}
