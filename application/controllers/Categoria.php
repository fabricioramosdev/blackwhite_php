<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->data['subTitle'] = 'Categoria Produto';
		$this->load->library('form_validation');
		$this->load->model('Categoria_model');
	}

	public function index()
	{
		$this->data['subTitle'] = 'Categoria Produto';
		$this->data['listaprodutoscategorias'] = $this->Categoria_model->listaCategoria();
		$this->data['listasubcategoria'] = $this->Categoria_model->listaSubcategoria();
		$this->load->view('categoria/index_view',$this->data);
	}


	public function add(){


		$this->data['subTitle'] = 'Adiciona Categoria / Sub-categoria Produto';
		$this->data['listaprodutoscategorias'] = $this->Categoria_model->listaCategoria();
		$this->data['listasubcategoria'] = $this->Categoria_model->listaSubcategoria();
		$this->load->view('categoria/add_view',$this->data);

	}


	public function post_categoria(){

		$form = $this->input->post();
		if($this->Categoria_model->post_categoria($form)){
			$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - Categoria salvo com sucesso!"
			));
		}
		redirect(base_url('Categoria/index'));


	}


	public function post_subcategoria(){
			$form = $this->input->post();
			if($this->Categoria_model->post_subcategoria($form)){	$this->session->set_flashdata('notfy',array(
				'type'  => "success",
				'title' => "Sucesso !!",
				'msg' => ":) - SubCategoria salvo com sucesso!"
			));
		}
		redirect(base_url('Categoria/index'));
	}


	public function delete_categoria(){
		$form = $this->input->post();
   	echo json_encode($this->Categoria_model->delete_categoria($form)) ;

	}

	public function delete_subcategoria(){
		$form = $this->input->post();
   	echo json_encode($this->Categoria_model->delete_subcategoria($form)) ;

	}







}
