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



  public function save_venda($data){

        $result = $this->db->insert('venda', $data);
        if($result){
          return    $this->db->insert_id();
        }

  }

  public function save_itens($data){

      $result = $this->db->insert_batch('venda_itens', $data);

  }

  public function save_parcelas($data){

      $result = $this->db->insert_batch('venda_prazo', $data);

  }

  public function baixa_itens($data){

    $result = $this->db->query("UPDATE  produto SET estoque_saldo = (estoque_saldo-{$data['produto_quantidade']}) WHERE id = {$data['produto_id']};");
    return $result;

  }


  public function pdf_venda($data){

     $result = $this->db->query("SELECT id, usuario_id, cliente_id, cliente_nome, pagamento_id, pagamento_descricao, pagamento_parcelas,
 pagamento_vencimento, desconto_valor, desconto_taxa, desconto_valor_sem_desconto, desconto_valor_com_desconto, venda_total,
 date_format(registro,'%d/%m/%Y') as registro, status FROM venda where id = {$data}")->result_array();


     foreach ($result as &$item) {
       $item ["itens"] = $this->pdf_itens($item ['id']);
       $item["parcelas"] =  $this->pdf_parcelas($item ['id']);
     }
     return $result;

  }

  public function pdf_itens($data){
    $result = $this->db->query("SELECT id, produto_id, produto_codigo, produto_descricao, produto_preco_venda, produto_quantidade, venda_id FROM venda_itens where venda_id = {$data}; ")->result_array();
    return $result;
  }

  public function pdf_parcelas($data){
    $result = $this->db->query("SELECT id, cliente_id, parcela, data_parcela, valor_parcela, status, venda_id FROM venda_prazo where venda_id = {$data}; ")->result_array();
    return $result;

  }



}
