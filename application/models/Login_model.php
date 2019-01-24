<?php

class Login_model extends CI_Model {

  protected $table = 'usuario';
  protected $PK = 'id';

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function check($data){
    $result = $this->db->query("SELECT A.id, A.nome, A.avatar, A.email, md5(A.id) as hash,  D.descricao as descperfil, D.id as idperfil, C.descricao as descloja, C.id as idloja
    FROM usuario as A  INNER JOIN usuario_acessa_loja as B ON A.id = B.usuario INNER JOIN loja C ON B.loja = C.id INNER JOIN perfil D ON A.fkperfil = D.id
    WHERE A.email= '{$data['email']}' AND A.senha = md5('{$data['senha']}') AND md5(B.loja) = '{$data['loja']}' AND A.status = 1 ;")->result_array();

    foreach ($result as &$item) {
      $item ["routes"] = $this->routes($item ['idperfil']);
    }

    return $result;
  }


  public function routes($data){
    //============================================================== retorna todas  as routes visiveis aside = true(1) para montar o menu
    $result = $this->db->query("SELECT B.label, concat(B.controller,'/',B.method) as url
    FROM perfil_acessa_routes A
    INNER JOIN routes B ON B.id = A.routes
    WHERE B.aside = 1
    AND A.status = 1
    AND B.status = 1
    AND  A.perfil = '{$data}' ;")->result_array();


    return $result;


  }


}
