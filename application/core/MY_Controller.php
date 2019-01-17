<?php

class MY_Controller extends CI_Controller {

    protected $data = array(
        "title" => "lolababy.com",
        "appname" => "&copy; LoLa BaBy",
        "subTitle" => null
    );

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->data['appname'] = date('Y')." - &copy; LoLa BaBy";
        //======================= valida se o usuário esta logado.
        if (!$this->session->usuario) {
            redirect(base_url());
        } else {

          $this->data['title'] = 'LoLa BaBy | ';
        //  echo json_encode($this->session->usuario[0]);
        //  exit();
          //======================= usuário logado passar alguns parametros
        }
    }

}
