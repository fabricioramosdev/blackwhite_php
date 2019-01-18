<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Meu perfil';
			  $this->load->model('Usuario_model');
 }

	public function index()
	{
		$this->load->view('profile_view',$this->data);
	}

	public function post(){
		$form =  $this->input->post();
		if($form['senha'] != ""){
			$form['senha'] = md5($form['senha']);
		}else{
 			unset($form['senha']);
		}
		if($this->Usuario_model->save($form)){
			$this->session->set_flashdata('notfy', array(
				'type'  => "success",
				'title' => "Sucesso ! ",
				'msg' => ":) - Seus dados foram alterados com sucesso!"
			));
		}
		redirect(base_url('LogOut'));

	}



}
