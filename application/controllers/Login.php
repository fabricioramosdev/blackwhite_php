<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("Login_model");
		$this->load->model("Loja_model");
		$this->data['title'] = 'Black and White Style | ';
		$this->data['subTitle'] = 'Login';
		$this->data['appname'] = date('Y')." - &copy; Black and White Style";
	}

	public function index()
	{

		$this->data['listalojas'] =	$this->Loja_model->listaLoja();
		$this->load->view('login_view',$this->data);

	}

	//============================ check do login e senha do usuário ================================
	public function check(){

		$form = $this->input->post();
		$this->setRegras();

		$this->data['form'] = $form;

		if ($this->form_validation->run() == FALSE)
		{

			// ==========  retorno do erro de validação
			$this->session->set_flashdata('notfy',array(
				'type'  => "warning",
				'title' => "Check Formulário",
				'msg' => ":( - Você preeencheu dados inválidos  !"
			));
			redirect($this->agent->referrer());


		}else{
			//===== validou com sucesso o formulário
			$rs = $this->Login_model->check($form);

			if(!empty($rs)){
				$this->session->set_userdata('usuario', $rs);
				redirect(base_url()."App/index");
			}else{
				$this->session->set_flashdata('notfy', array(
					'type'  => "error",
					'title' => "Acesso Negado! ",
					'msg' => ":(  - Acesso negado, por favor verifique suas credenciais !"
				));
				redirect($this->agent->referrer());
			}
		}

	}
	//================================================================================================


	//=========================== setRegras de validação do fomulario
	private function setRegras() {
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('loja', 'Loja', 'required');
	}
	//=================================================================

}
