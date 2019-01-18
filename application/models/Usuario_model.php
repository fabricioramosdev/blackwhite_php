<?php

class Usuario_model extends MY_Model {

    protected $table = 'usuario';
    protected $PK = 'id';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

  


}
