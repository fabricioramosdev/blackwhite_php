<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends MY_Controller {

	public function __construct() {
		 parent::__construct();
     	 $this->data['subTitle'] = 'Dashboard';
 }

	public function index()
	{
		$this->load->view('index_view',$this->data);
	}



}
