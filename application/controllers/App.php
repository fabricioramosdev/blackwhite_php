<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Dashboard';
			 		$this->load->model('App_model');
 }

	public function index()
	{
		$this->data['vendas_mes'] = $this->App_model->vendas_mes();
		$this->data['vendas_semana'] = $this->App_model->vendas_semana();
		$this->data['vendas_atradas'] = $this->App_model->vendas_atradas();
		$this->data['aniversariantes_mes'] = $this->App_model->aniversariantes_mes();


		$this->data['chart_curva_abc_produtos'] = $this->App_model->curva_abc_produtos();
		$this->data['chart_faturamento_mensal'] = $this->App_model->chart_faturamento_mensal();
		$this->data['chart_vendas_forma_pagamento'] = $this->App_model->chart_vendas_forma_pagamento();


		$this->load->view('index_view',$this->data);
	}



}
