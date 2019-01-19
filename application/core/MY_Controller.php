<?php

class MY_Controller extends CI_Controller {

    protected $data = array(
        "title" => "Black and White Style",
        "appname" => "&copy;&nbsp;Black and White Style",
        "subTitle" => null
    );

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->data['appname'] = date('Y')." - &copy;&nbsp; Black and White Style";
        //======================= valida se o usuário esta logado.
        if (!$this->session->usuario) {
            redirect(base_url());
        } else {

          $this->data['title'] = 'black white | ';

          $controller = $this->router->class;
          $method = $this->router->method;

           $check_routes = array(
               "controller" => $controller,
               "method" => $method,
               "perfil" => $this->session->usuario[0]['idperfil']
           );
           //============================================ verifica as rotas e se o usuário possi acesso a elas
        	$this->load->model("Routes_model");
          $rs =  $this->Routes_model->check($check_routes);


          if(empty($rs)){

          		$this->session->set_flashdata('notfy', array(
      					'type'  => "info",
      					'title' => "Sem acesso ! ",
      					'msg' => ":( - Você não possui acesso a esta funcionalidade !"
      				));

              if($this->session->usuario[0]['idperfil'] == '1'){
                //===================================  cadastra nova Routes
                // =================================== libera acesso para o root
                $this->cadastraRouteLiberaRoot($check_routes);

                $this->session->set_flashdata('notfy', array(
                  'type'  => "info",
                  'title' => "Acesso liberado ! ",
                  'msg' => ":) -Sr° Root seja bem vindo!"
                ));



              }

      				redirect($this->agent->referrer());
           }


        }
    }

    //===================================  cadastra nova Routes
    // =================================== libera acesso para o root
    private function cadastraRouteLiberaRoot($data){
      $this->load->model('Routes_model');
      $this->Routes_model->RouteLiberaRoot($data);
    }


}
