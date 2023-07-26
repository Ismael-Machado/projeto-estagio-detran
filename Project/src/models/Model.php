<?php 

//classe que serve de base (modelo/model) para interação com o banco de dados 
class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];
    
    function __construct($array) {
        $this->loadFromArray($array);
    }

    //função que percorre os dados carregados de um array
    //chama a função set e insere o par de chaves e valores 
    //do array no atributo values da classe 
    public function loadFromArray($array) {
        if($array){
            foreach($array as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function getSelect($filters = [], $columns = '*') {
        $sql = 'SELECT ${columuns} FROM '
            . static::$tableName
            . static::getFilters($filters);
        return $sql;
    }

    //refactoring code 
    //função que serve para tratar os filtros(cláusulas) do select da função getSelect 
    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }

        return $sql;
    }
    
    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}