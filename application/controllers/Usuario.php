<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Usuarios';
		$this->load->model('Usuario_model');
	}

	public function index()
	{
		$this->data['listausuarios'] = $this->Usuario_model->listaUsuario();
		$this->load->view('usuario/index_view',$this->data);
	}


	public function add()
	{
		$this->load->model('Loja_model');
		$this->load->model('Perfil_model');

		$this->data['listaLoja'] = $this->Loja_model->listaLoja();
		$this->data['listaPerfil'] = $this->Perfil_model->listaPerfil();

		$this->load->view('usuario/add_view',$this->data);

	}


	public function post(){

		$form = $this->input->post();
		$id = $this->Usuario_model->post($form);
		// recebendo o id do usuário prepara o array para inserir as permissões nas lojas
		if($id != ""){
			foreach ($form['loja'] as $key => $value) {
				$accessoloja[] = array("usuario"=>$id,"loja"=>$value);
			}
		}
		$this->load->model('Loja_model');
		if($this->Loja_model->acessoloja($accessoloja)){

			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Usuário salvo com sucesso!"
			));
			redirect(base_url('Usuario/index'));

		}

	}


	public function edit($id){


		$this->load->model('Loja_model');
		$this->load->model('Perfil_model');
		//==============================
		$this->data['usuario'] = $this->Usuario_model->listaUsuario($id);
		$this->data['listaLoja'] = $this->Loja_model->listaLoja();
		$this->data['listaPerfil'] = $this->Perfil_model->listaPerfil();

		$this->load->view('usuario/edit_view',$this->data);


	}

	public function put(){

		$form =  $this->input->post();

		if (!isset($form['status']))
		$form['status'] = "0";


		$usuario = array("id"=>$form['id'],
		"nome"=>$form['nome'],
		"email"=>$form['email'],
		"senha"=>md5($form['senha']),
		"fkperfil"=>$form['perfil'],
		"status"=>$form['status']);

		if($form['senha'] == "")
		unset($usuario['senha']);

		$this->Usuario_model->put($usuario);

		//prepara o acesso as lojas
		foreach ($form['loja'] as $key => $value) {
			$accessoloja[] = array("usuario"=>$form['id'],"loja"=>$value);
		}

		// executa os acesso as lojas
		$this->load->model('Loja_model');
		// echo json_encode($accessoloja);
		// exit();

		$this->Loja_model->acessoloja($accessoloja);

		$this->session->set_flashdata('notfy',array(
			'type'  => "success",
			'title' => "Sucesso !!",
			'msg' => ":) - Usuário salvo com sucesso!"
		));
		redirect(base_url('Usuario/index'));


	}


	public function delete(){

			$form =  $this->input->post();
			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Usuário deletado com sucesso!"
			));
			echo json_encode($this->Usuario_model->delete($form['id']));


	}



}
