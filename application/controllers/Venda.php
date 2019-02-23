<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Venda extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Venda';
		$this->load->model('Cliente_model');
		$this->load->model('Venda_model');
		$this->load->model('Produto_model');
		$this->load->helper('date_helper');

	}

	public function index($hash = null)
	{

		$this->data['produto'] = $this->Produto_model->listaProduto();
		$this->data['clientes'] = $this->Cliente_model->listaCliente();
		$this->load->view('venda/index_view',$this->data);

	}



	public function search_produto() {

		$query = $this->input->get();

		$array = $this->Venda_model->search_produto($query['query']);
		$autocomplete = [];
		foreach ($array as $key => $value) {
			array_push($autocomplete,$value);
		}
		echo $this->input->get('callback') . '(' . json_encode($autocomplete) . ')';
	}


	public function busca_produto(){

		$id = $this->input->post();
		echo json_encode($this->Produto_model->listaProduto($id['id']));

	}


	public function finalizar_venda(){

		$form =  $this->input->post();


		$venda_itens = json_decode($form['venda_itens']);
		$venda_forma_pagamento = json_decode($form['venda_forma_pagamento']);
		$venda_desconto = json_decode($form['venda_desconto']);
		$venda_cliente = json_decode($form['venda_cliente']);


		$total_compra = 0.00;
		foreach ($venda_itens as $key => $value) {
			$total_compra += (Float)$value->total_item;
		}


		$venda = Array(
			'usuario_id'=> $this->session->usuario[0]['id'],
			'cliente_id' => (isset($venda_cliente->id))?$venda_cliente->id:null,
			'cliente_nome'=> (isset($venda_cliente->nome))?$venda_cliente->nome:null,
			'pagamento_id'=>$venda_forma_pagamento->id,
			'pagamento_descricao'=>$venda_forma_pagamento->descricao,
			'pagamento_parcelas'=>(isset($venda_forma_pagamento->parcelas))?$venda_forma_pagamento->parcelas:null,
			'pagamento_vencimento'=>(isset($venda_forma_pagamento->vencimento))?parseDate($venda_forma_pagamento->vencimento):null,
			'desconto_valor'=>(isset($venda_desconto->valor_desconto))?$venda_desconto->valor_desconto:00.00,
			'desconto_taxa'=>(isset($venda_desconto->taxa_desconto))?$venda_desconto->taxa_desconto:00.00,
			'desconto_valor_sem_desconto'=>(isset($venda_desconto->total_sem_desconto))?$venda_desconto->total_sem_desconto:00.00,
			'desconto_valor_com_desconto'=>(isset($venda_desconto->total_com_desconto))?$venda_desconto->total_com_desconto:00.00,
			'venda_total'=>(isset($venda_desconto->total_com_desconto))?$venda_desconto->total_com_desconto:$total_compra,
		);



		if($venda['cliente_id'] == null){
			unset($venda['cliente_id']);
		}

		if($venda['cliente_nome'] == null){
			unset($venda['cliente_nome']);
		}

		if($venda['pagamento_parcelas'] == null){
			unset($venda['pagamento_parcelas']);
		}

		if($venda['pagamento_vencimento'] == null){
			unset($venda['pagamento_vencimento']);
		}

		$venda_id = $this->Venda_model->save_venda($venda);

		$lista_itens = Array();
		foreach ($venda_itens as $key => $value) {

			$item = Array(
				'produto_id'=>$value->id,
				'produto_codigo'=>$value->codigo,
				'produto_descricao'=>$value->descricao,
				'produto_preco_venda'=>$value->preco_venda,
				'produto_quantidade'=>$value->quantidade_item,
				'venda_id'=>$venda_id
			);

			array_push($lista_itens,$item);
		}

		$result = $this->Venda_model->save_itens($lista_itens);


		// verifica se venda foi parcelada
		if($venda_forma_pagamento->id == 4 && (isset($venda_forma_pagamento->parcelas))){

			$data_parcela = parseDate($venda_forma_pagamento->vencimento);
			$parcela = (int) $venda_forma_pagamento->parcelas;
			$valor_parcela =  ((Float)$venda['venda_total']/$parcela);
			$cliente_id = $venda_cliente->id;
			$venda_id = $venda_id;
			$data = $data_parcela;

			$venda_parcelas = [];
			for($i = 1; $i <= $parcela;$i++){

				if($i == 1){
					$data = $data_parcela;
				}else{
					$data = date('Y-m-d', strtotime($data ."+1 month"));
				}
				$dados = Array(
					"cliente_id" => $cliente_id,
					"parcela" => "{$i}/{$parcela}",
					"data_parcela"=> $data,
					"valor_parcela"=> $valor_parcela,
					"venda_id"=>$venda_id
				);
				array_push($venda_parcelas,$dados);
			}

			$result = $this->Venda_model->save_parcelas($venda_parcelas);

		}

		echo json_encode(true);


	}





}
