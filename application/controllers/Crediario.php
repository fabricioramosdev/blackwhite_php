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

			$this->session->set_flashdata('notfy',array(
				'type'  => "info",
				'title' => "Consulta crediário",
				'msg' => ":) - Consultando crediário cliente!"
			));

			$this->data['listaparcelas'] = $this->Crediario_model->lista_parcelas_cliente_crediario($id);
			if(sizeof($this->data['listaparcelas']) ==0){
				$this->session->set_flashdata('notfy',array(
					'type'  => "info",
					'title' => "Consulta crediário",
					'msg' => ":) - Cliente não possui parcelas em aberto!"
				));
				redirect(base_url().'Crediario/index');
			}


			$this->data['resumo_cliente_crediario'] = $this->Crediario_model->resumo_cliente_crediario($id);
			$this->load->view('crediario/crediario_cliente_view',$this->data);

		}

	}

	public function plus_itens_venda_crediario(){
		echo json_encode($this->Crediario_model->plus_itens_venda_crediario($this->input->post('id')));

	}

	public function pagar_parcela_crediario(){

		echo json_encode($this->Crediario_model->pagar_parcela_crediario($this->input->post('id')));

	}

	public function atraso(){


		$this->data['listaatraso'] = $this->Crediario_model->lista_atraso_crediario();
				$this->load->view('crediario/atraso_view',$this->data);


	}




}