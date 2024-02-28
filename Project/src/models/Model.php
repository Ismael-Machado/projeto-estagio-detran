<?php 

//classe que serve de base (modelo/model) para interação com o banco de dados 
class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];
    
    function __construct($array, $sanitize = true) {
        $this->loadFromArray($array, $sanitize);
    }

    //função que percorre os dados carregados de um array
    //chama a função set e insere o par de chaves e valores 
    //do array no atributo values da classe 
    public function loadFromArray($array, $sanitize = true) {
        if($array){
            foreach($array as $key => $value) {
                $cleanValue = $value;
                if($sanitize && isset($value)) {
                    $cleanValue = strip_tags(trim($cleanValue));
                }
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

    public function getValues() {
        return $this->values;
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

    public function insert() {
        $sql = "INSERT INTO " . static::$tableName . " ("
        . implode(",", static::$columns) . ") VALUES (";
        foreach(static::$columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeSQL($sql);
        
        return $id;
    }

    
    public function update($id) {
        $sql = "UPDATE " . static::$tableName . " SET ";
        foreach(static::$columns as $col) {
            $sql .= " ${col} = " . static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql) -1] = ' ';

        $class = get_called_class();
        $class = $this->getClassId($class);
        //esse id é o id da instância 
        //provelmente vou ter que por o id específico de cada estância  ou 
        //alterar todas as tabelas e atributos para serem apenas id (oq é mais fácil de implementar)
        $sql .= "WHERE ". $class ." = {$id}";
        Database::executeSQL($sql);
    }

    //refactoring code 
    //função que serve para tratar os filtros(cláusulas) do select da função getSelect 
    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                if ($column == 'raw') {
                    $sql .= " AND {$value}";
                } elseif ($column == 'order') {
                    $sql .= " {$value}";
                } else {
                    $sql .= " AND ${column} = " . static::getFormatedValue($value);
                }
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

    private static function getClassId ($class) {
        if($class == "Chamados") {
            return "chamado_id";
        } elseif($class == "Setores") {
            return "setor_id";
        } elseif($class == "User") {
            return "usuario_id";
        } elseif($class == "Assuntos") {
            return "assunto_id";
        } else {
            return "id";
        }
    }
}