<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Meu perfil';
 }

	public function index()
	{
		$this->load->view('profile_view',$this->data);
	}



}
