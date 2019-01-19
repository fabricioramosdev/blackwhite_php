<?php

class Loja_model extends MY_Model {

    protected $table = 'loja';
    protected $PK = 'id';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function listaLoja(){
      $result = $this->db->query("SELECT id, descricao, registro, status, md5(id) as hash
     FROM loja WHERE status = 1;")->result_array();
          return $result;
    }

    public function acessoloja($data){
        // limpa todos os acessos do usuário
        $this->db->where('usuario', $data[0]['usuario']);
        $result = $this->db->delete('usuario_acessa_loja');

        // insere novamente os novos acesso
        $result = $this->db->insert_batch('usuario_acessa_loja', $data);
        return $result;
    }


}
