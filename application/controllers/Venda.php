<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Venda extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Venda';
			 $this->load->model('Cliente_model');
			 $this->load->model('Venda_model');
			 $this->load->model('Produto_model');

 }

	public function index()
	{
		 $this->data['produto'] = $this->Produto_model->listaProduto();
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





}
