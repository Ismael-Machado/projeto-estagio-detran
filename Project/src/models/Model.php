<?php 

//classe que serve de base (modelo/model) para interação com o banco de dados 
class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];
    
    function __construct($array) {
        $this->loadFromArray($array);
    }

    
    public function loadFromArray($array) {
        if($array){
            foreach($array as $key => $value) {
                $this->set($key, $value);
            }
        }
    }

    public function get($key) {

    }


    public function set($key, $value) {
        $this->values[$key] = $value;
    }
}