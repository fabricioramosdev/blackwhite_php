<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crediario extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Crediário';
		$this->load->library('form_validation');
		$this->load->model('Crediario_model');
		$this->load->helper('html_util_helper');
		$this->load->helper('date_helper');
	}

	public function index()
	{

		$this->data['listaclientes'] = $this->Crediario_model->lista_cliente_crediario();
		$this->load->view('crediario/index_view',$this->data);
	}


public function crediario_cliente($id =  null){

	if($id != null){

				$this->data['listaparcelas'] = $this->Crediario_model->lista_parcelas_cliente_crediario($id);
				$this->load->view('crediario/crediario_cliente_view',$this->data);

	}

}




}
