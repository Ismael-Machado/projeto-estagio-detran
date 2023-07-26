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

    //pega o resultado bruto de uma consulta e retorna objetos associados ao array de resultados
    public static function get($filters = [], $columns = '*') {
        $objects = [];
        $result = static::getResultFromSelect($filters, $columns);
        
        if($result) {
            $class = get_called_class();
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }

        return $objects;
    }

    public static function getOne($filters = [], $columns = '*') {
        $class = get_called_class();
        $result = static::getResultFromSelect($filters, $columns);
        
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    //retorna o resultado bruto de uma consulta 
    public static function getResultFromSelect($filters = [], $columns = '*') {
        $sql = "SELECT ${columns} FROM " . static::$tableName . static::getFilters($filters);

        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
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