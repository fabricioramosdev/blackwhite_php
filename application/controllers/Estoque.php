<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estoque extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Estoque';
		$this->load->model('Produto_model');
		$this->load->model('Estoque_model');
		$this->load->helper('html_util_helper');
		$this->load->helper('date_helper');
	}

	public function index()
	{
		$this->data['listaprodutos'] = $this->Produto_model->listaProduto();
		$this->load->view('estoque/index_view',$this->data);
	}

	public function put(){

		$form =  $this->input->post();
		$this->Estoque_model->put($form);

		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Estoque rápido",
			'msg' => ":) - Saldo estoque alterado com sucesso  !"
		));

			redirect($this->agent->referrer());

	}



}
