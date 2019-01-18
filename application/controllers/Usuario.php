<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Usuarios';
 }

	public function index()
	{
		$this->load->view('usuario_view',$this->data);
	}



}
