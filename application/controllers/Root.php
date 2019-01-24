<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Root extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Root';
			 $this->load->model('Root_model');
 }

	public function index()
	{

		$this->data['usuarioroot'] = 	$this->Root_model->listaUsuarioRoot();
		$this->data['routes'] =	$this->Root_model->listaRoutes();
		$this->data['perfil'] =	$this->Root_model->listaPerfil();
		$this->data['perfillistaacessos'] =	$this->Root_model->perfilListaAcessos();




		$this->load->view('root/index_view',$this->data);
	}


	public function putprofile(){

		$form =  $this->input->post();

		$root = array("id"=>$form['id'],
		"nome"=>$form['nome'],
		"email"=>$form['email'],
		"senha"=>md5($form['senha']));

		if($form['senha'] == "")
		unset($root['senha']);

		$this->Root_model->putprofile($root);
		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sr. Root",
			'msg' => ":) - Seus dados foram atualizado com sucesso  !"
		));
		redirect($this->agent->referrer());

	}


	public function postLiberarAcesso(){

		$form =  $this->input->post();
		$this->Root_model->postLiberarAcesso($form);
		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sr. Root",
			'msg' => ":) - Acesso liberado com sucesso !"
		));
		redirect($this->agent->referrer());

	}

	public function deletarAcesso(){

		$form =  $this->input->post();
		$this->Root_model->deletarAcesso($form);
		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sr. Root",
			'msg' => ":) - Acesso deletado com sucesso !"
		));
		redirect($this->agent->referrer());
	}




	public function clonarAcesso(){

		$form =  $this->input->post();


		$this->Root_model->clonarAcesso($form);
		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sr. Root",
			'msg' => ":) - Acessos clonados com sucesso !"
		));
		redirect($this->agent->referrer());
	}






}
