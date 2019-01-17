<?php

class MY_Model extends CI_Model{

    private $ci;
    protected $table;
    protected $PK = 'id';
    protected $dateFields = array();
    protected $decimalFields = array();

    public function __construct() {
        parent::__construct();
        $this->ci =& get_instance();
    }

    public function getTable(){
        return $this->table;
    }

    public function getPk(){
        return $this->PK;
    }

    public function save(&$data){

        $this->prepare($data);

        if (array_key_exists($this->PK, $data) ){
            if ( $data[$this->PK] == null ){
                $this->insert($data);
                $data = $this->getById($this->db->insert_id());
            }else{
                $this->update($data);
                $data = $this->getById( $data[$this->PK] );
            }
        }else{
            $this->insert($data);
            $data = $this->getById( $data[$this->PK] );
        }
    }

    public function getById($id){
        $this->ci->db->select( $this->getFields(), false);
        $output = $this->ci->db->where($this->PK, $id)->get( $this->table )->row_array();

        if (is_array($output)){
            $output[$this->PK] = $id;
            $output["hash"] = md5( $output[$this->PK] );
        }

        return $output;
    }

    public function getByHash($hash=''){
        $this->ci->db->select( $this->getFields(), false );
        $output =  $this->ci->db->where('MD5('.$this->PK.')', $hash)->get( $this->table )->row_array();

        if (is_array($output)){
            $output["hash"] = $hash;
        }

        return $output;
    }

    protected function getAll(){
        $this->ci->db->select($this->getFields() . ", MD5({$this->PK}) as hash", false);
         return $this->ci->db->get( $this->table )->result_array();
    }

    public function getCriteria($input=array()){

        if ( array_key_exists("criteria", $input) ){
            if ( is_array( $input["criteria"] ) ){
                $criteria = $input["criteria"];

                if ( array_key_exists("like", $criteria) ){
                    if ( is_array( $criteria["like"] ) ){
                        if ( count( $criteria["like"] ) ){
                            foreach( $criteria["like"] as $like ){
                                $this->db->like( $like );
                            }
                        }
                    }else{
                        $this->db->like( $criteria["like"] );
                    }
                }

                if ( array_key_exists("or_like", $criteria) ){
                    if ( is_array( $criteria["or_like"] ) ){
                        if ( count( $criteria["or_like"] ) ){
                            foreach( $criteria["or_like"] as $or_like ){
                                $this->db->or_like( $or_like );
                            }
                        }
                    }else{
                        $this->db->or_like( $criteria["or_like"] );
                    }
                }

                if ( array_key_exists("where", $criteria) ){
                    if ( is_array( $criteria["where"] ) ){
                        if ( count( $criteria["where"] ) ){
                            foreach( $criteria["where"] as $where ){
                                $this->db->where( $where );
                            }
                        }
                    }else{
                        $this->db->where( $criteria["where"] );
                    }
                }

                if ( array_key_exists("or_where", $criteria) ){
                    if ( is_array( $criteria["or_where"] ) ){
                        if ( count( $criteria["or_where"] ) ){
                            foreach( $criteria["or_where"] as $or_where ){
                                $this->db->or_where( $or_where );
                            }
                        }
                    }else{
                        $this->db->or_where( $criteria["or_where"] );
                    }
                }

            }
        }

        if ( array_key_exists("fields", $input) ){

            $fields = $input["fields"];

            /*@Thiago: Quando existir o indice fields
             * Realizar o mesmo procedimento do getFields
             */
            if ( is_array( $input["fields"] ) ){
                $this->db->select( implode(",", $fields ), false );
            }else{
                $this->db->select( $fields, false );
            }
        }else{
            $this->db->select( $this->getFields(), false );
        }

        if ( array_key_exists("limit", $input) ){
            if ( is_array( $input["limit"] ) ){
                if ( array_key_exists("limit", $input["limit"] ) &&
                     array_key_exists("offset", $input["limit"] ) ){
                    $this->db->limit($input["limit"]["limit"], $input["limit"]["offset"]);
                }else if ( array_key_exists("limit", $input["limit"] ) ) {
                    $this->db->limit($input["limit"]["limit"]);
                }
            }else if ( is_numeric( $input["limit"] ) ){
                $this->db->limit($input["limit"]);
            }
        }
        if ( array_key_exists("order_by", $input) ){
            $this->db->order_by($input["order_by"]);
        }

        $output = $this->ci->db->get( $this->table )->result_array();;

//        echo $this->db->last_query();
//
//        exit;

        return $output;

    }

    public function delete($id){
        $this->ci->db->delete(
            $this->table, array(
                $this->PK => $id
            )
        );
    }

    public function exists($conditions){

        $output = $this->getCriteria(
            array(
                "criteria" => array(
                    "where" => $conditions
                )
            )
        );

        return count($output) > 0;
    }

    public function get_enum_values($field){
        $type = $this->db->query( "SHOW COLUMNS FROM {$this->table} WHERE Field = '{$field}'" )->row( 0 )->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }

    public function get_distinct_values($field){
        $this->db->select("DISTINCT {$field}", false);
        $this->db->from("{$this->table}");
        $this->db->where("{$field} <> '' and {$field} IS NOT NULL", null, false);

        $result = $this->db->get()->result_array();

        $output = array();

        foreach($result as $item){
            $output[] = $item[$field];
        }

        return $output;
    }

    private function update($data){
        $this->ci->db->where($this->PK, $data[$this->PK]);
        unset( $data[$this->PK] );
        $this->ci->db->update($this->table, $data);
    }

    private function insert(&$data){
        $this->ci->db->insert($this->table, $data);
        $data[$this->PK] = $this->db->insert_id();
    }

    private function prepare(&$data){

        if (array_key_exists("hash", $data)){
            unset($data["hash"]);
        }

        if ( count( $this->dateFields ) > 0 ){
            foreach ( $this->dateFields as $field => $format ){
                if ( array_key_exists($field, $data) ){
                    if ( $data[$field] != null ){
                        $data[$field] = $this->parseDateTime($data[$field], $format, "Y-m-d H:i");
                    }
                }
            }
        }

        if ( count( $this->decimalFields ) > 0 ){
            foreach( $this->decimalFields as $field ){
                if ( array_key_exists($field, $data ) ){
                    $data[$field] = $data[$field] == null ? null : str_replace("|", "", str_replace(",", ".", str_replace(".", "|", $data[$field])));
                }
            }
        }

    }

    protected function parseDateTime($subject, $formatOrigem="d/m/Y H:i:s", $formatDestino="Y-m-d H:i:s") {

        $date = DateTime::createFromFormat($formatOrigem, $subject);

        if (method_exists($date, "format")){
            return $date->format($formatDestino);
        }else{
            return false;
        }

    }

    public function __call($method, $args){

        if (method_exists($this, $method)){

            if ( $this->table == null ){
                show_error(
                    "Impossível executar o método <b>{$method}</b> do model <b>".get_class($this)."</b>.
                     O atributto table não foi definido.
                     <code>
                         <span style='color: orangered'>protected</span>
                         <span style='color: dodgerblue'>\$table</span> =
                         <span style='color: dimgray'>'nome_da_tabela'</span>;
                     </code>");
            }else{
                switch ( $method ){
                    case 'getById':
                        return $this->getById($args[0]);

                    case 'getByHash':
                        return $this->getByHash($args[0]);

                    case 'getAll':
                        return $this->getAll();

                    case 'getCriteria':
                        return $this->getCriteria();

                    case 'save':
                        return $this->save($args[0]);

                    default:
                        show_error("O método <b>{$method}</b> não existe no model <b>".get_class($this)."</b>.");
                }
            }

        }else{
            show_error("O método <b>{$method}</b> não existe no model <b>".get_class($this)."</b>.");
        }
    }

    protected function getFields(){
        $fields = array();
        $output = $this->db->query("SHOW COLUMNS FROM {$this->table}")->result_array();

        foreach($output as $field){

            if ( in_array( $field["Type"], array("date", "datetime", "timestamp") ) ) {
                if ( array_key_exists( $field["Field"], $this->dateFields ) ){
                    $fields[] = $this->getMySQLDateFormat($field["Field"]);
                }else{
                    $fields[] = $this->table.".".$field["Field"];
                }
            }else if ( strpos($field["Type"], "decimal") !== false ) {
                if ( in_array( $field["Field"], $this->decimalFields ) ){
                    $fields[] = $this->getDecimalFormat($field["Field"]);
                }else{
                    $fields[] = $this->table.".".$field["Field"];
                }
            }else{
                $fields[] = $this->table.".".$field["Field"];
            }
        }

        $fields[] = "MD5({$this->table}.{$this->PK}) as hash";

        return implode(", ", $fields);
    }

    private function getMySQLDateFormat($field){

        $from = array('d','m','Y','H','i','s');
        $to = array('%d','%m','%Y','%H','%i','%s');
        $format = $this->dateFields[$field];

        return "IF(UNIX_TIMESTAMP({$this->table}.{$field}) IS NULL OR UNIX_TIMESTAMP({$this->table}.{$field}) = 0, NULL, DATE_FORMAT({$this->table}.{$field}, '".str_replace($from, $to, $format)."')) AS {$field}";
    }

    private function getDecimalFormat($field){
        return "FORMAT({$this->table}{$field}, 2, 'de_DE') AS {$field}";
    }

}
