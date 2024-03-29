<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Cliente';
		$this->load->library('form_validation');
		$this->load->model('Cliente_model');
		$this->load->helper('html_util_helper');
		$this->load->helper('date_helper');
	}

	public function index()
	{

		$this->data['listaclientes'] = $this->Cliente_model->listaCliente();
		$this->load->view('cliente/index_view',$this->data);
	}


	public function add()
	{

		$this->load->view('cliente/add_view',$this->data);

	}


	public function post(){

		$form = $this->input->post();

		$form['whatsapp'] = '';

		if( $form['telCel'] != ''){
			$whastapp = $form['telCel'];
			$whastapp = str_replace('(','',$whastapp);
			$whastapp = str_replace(')','',$whastapp);
			$whastapp = str_replace('-','',$whastapp);
			$whastapp = str_replace(' ','',$whastapp);
			$whastapp = '055'.trim($whastapp);
			$whastapp = "https://api.whatsapp.com/send?phone={$whastapp}&text=Olá,{$form['nome']}";
			$form['whatsapp'] =  $whastapp;
		}

		$this->setRegras();
		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('notfy',array(
				'type'  => "warning",
				'title' => "Check formulário",
				'msg' => ":( - Você preeencheu dados inválidos  !"
			));


		}else{


			if(substr($form['telOut'],-1) == "_"){
				$form['telOut'] = substr($form['telOut'],0,-1);
			}

			if(	$form['datanasc'] != ""){
				$form['datanasc'] = 	parseDate($form['datanasc']);
			}else{
				$form['datanasc'] =  NULL;
			}

			$this->Cliente_model->post($form);

			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Cliente salvo com sucesso!"
			));


		}
		redirect(base_url('Cliente/index'));

	}


	public function edit($id){

		$this->data['cliente'] = $this->Cliente_model->listaCliente($id);
		$this->load->view('cliente/edit_view',$this->data);

	}

	public function put(){

		$form =  $this->input->post();
		$form['whatsapp'] = '';

		if( $form['telCel'] != ''){
			$whastapp = $form['telCel'];
			$whastapp = str_replace('(','',$whastapp);
			$whastapp = str_replace(')','',$whastapp);
			$whastapp = str_replace('-','',$whastapp);
			$whastapp = str_replace(' ','',$whastapp);
			$whastapp = '055'.trim($whastapp);
			$whastapp = "https://api.whatsapp.com/send?phone={$whastapp}&text=Olá,{$form['nome']}";
			$form['whatsapp'] =  $whastapp;
		}

		$this->setRegras();
		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('notfy',array(
				'type'  => "warning",
				'title' => "Check formulário",
				'msg' => ":( - Você preeencheu dados inválidos  !"
			));


		}else{

			if (!isset($form['status']))
			$form['status'] = "0";

			if(substr($form['telOut'],-1) == "_"){
				$form['telOut'] = substr($form['telOut'],0,-1);
			}

			if(	$form['datanasc'] != ""){
				$form['datanasc'] = 	parseDate($form['datanasc']);
			}else{
				$form['datanasc'] =  NULL;
			}


			$this->Cliente_model->put($form);
			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Cliente editado com sucesso!"
			));

		}

		redirect(base_url('Cliente/index'));
	}


	public function delete(){

		$form =  $this->input->post();
		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sucesso !!",
			'msg' => ":) - Cliente deletado com sucesso!"
		));
		echo json_encode($this->Cliente_model->delete($form['id']));

	}


	public function view(){
		$form = $this->input->post();
		echo json_encode( $this->Cliente_model->listaCliente($form['id']));

	}


	//=========================== setRegras de validação do fomulario
	private function setRegras() {
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('cpf', 'CPF', 'required');

	}
	//=================================================================



}
