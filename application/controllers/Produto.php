<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produto extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Produto';
		$this->load->library('form_validation');
		$this->load->model('Produto_model');
		$this->load->model('Produto_categoria_model');
		$this->load->helper('html_util_helper');
		$this->load->helper('date_helper');
	}

	public function index()
	{

		$this->data['listaprodutos'] = $this->Produto_model->listaProduto();
		$this->load->view('produto/index_view',$this->data);
	}


	public function add()
	{

		$this->data['listaprodutoscategorias'] = $this->Produto_categoria_model->listaCategoria();
		$this->load->view('produto/add_view',$this->data);

	}


	public function post(){

		$form = $this->input->post();

		$this->setRegras();
		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('notfy',array(
				'type'  => "warning",
				'title' => "Check formulário",
				'msg' => ":( - Você preeencheu dados inválidos  !"
			));
			redirect($this->agent->referrer());


		}else{



			$idProduto = $this->Produto_model->post($form);

			// prepara array para dar input do novo produto no estoque
			$inputProdutoEstoque = array("produto"=> $idProduto,
			"input"=> (Integer) $form['estoque_saldo'],
			"balance"=> (Integer) $form['estoque_saldo'],
			"usuario"=> $this->session->usuario[0]['idperfil']);

			$this->load->model('Estoque_model');
			$this->Estoque_model->inputProdutoEstoque($inputProdutoEstoque);

			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Produto salvo com sucesso!"
			));

		}
		redirect(base_url('Produto/index'));

	}


	public function edit($id){

		$this->data['produto'] = $this->Produto_model->listaProduto($id);
		$this->data['listaprodutoscategorias'] = $this->Produto_categoria_model->listaCategoria();

		$this->load->view('produto/edit_view',$this->data);

	}

	public function put(){

		$form =  $this->input->post();
		$this->setRegras();
		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('notfy',array(
				'type'  => "warning",
				'title' => "Check formulário",
				'msg' => ":( - Você preeencheu dados inválidos  !"
			));
				redirect($this->agent->referrer());

		}else{

			if (!isset($form['status']))
			$form['status'] = "0";

			$this->Produto_model->put($form);
			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Produto editado com sucesso!"
			));

		}


		redirect(base_url('Produto/index'));
	}


	public function delete(){

		$form =  $this->input->post();
		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sucesso !!",
			'msg' => ":) - Produto deletado com sucesso!"
		));
		echo json_encode($this->Produto_model->delete($form['id']));

	}


	public function view(){
		$form = $this->input->post();
		echo json_encode( $this->Cliente_model->listaCliente($form['id']));

	}

	public function checkcodigo(){
		$form =  $this->input->post();
		echo json_encode($this->Produto_model->checkcodigo($form));

	}





	//=========================== setRegras de validação do fomulario
	private function setRegras() {
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('preco_venda', 'Preço Venda', 'required');
		$this->form_validation->set_rules('estoque_saldo', 'Estoque saldo', 'required');
	}
	//=================================================================



}
