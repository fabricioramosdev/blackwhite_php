<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crediario extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Crediario';
		$this->load->library('form_validation');
		$this->load->model('Cliente_model');
		$this->load->model('Crediario_model');
		$this->load->helper('html_util_helper');
		$this->load->helper('date_helper');
	}

	public function index()
	{

		$this->data['clientes'] = $this->Cliente_model->listaCliente();
		$this->load->view('crediario/index_view',$this->data);
	}

	public function busca_crediario(){
		$form =  $this->input->post();

		$parcelas = $this->Crediario_model->busca_crediario($form);
		echo json_encode($parcelas);



	}



}
