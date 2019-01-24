<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Venda extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Venda';
			 $this->load->model('Cliente_model');
			 $this->load->model('Produto_model');
 }

	public function index()
	{
		$this->load->view('venda/index_view',$this->data);
	}





}
