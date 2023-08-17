<?php 

// classe responsável pelas definições de conexão com o banco de dados 
// uso de nomeclaturas em inglês (nome de funções, variáveis, etc) como padrão

class Database {

    //função que estabelece conexão com o banco
    public static function getConnection() {
        //obtendo o caminho do arquivo env com as definições do banco de dados
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        //guardando o conteúdo do arquivo na variável env 
        $env = parse_ini_file($envPath);
        //criando uma conexão passando como parâmetro o env
        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);
        
        if($conn->connect_error) {
            die("Erro: " . $conn->connect_error);
        }

        return $conn;
    }

    //função que retorna do banco de dados resultado de uma query 
    public static function getResultFromQuery($sql) {
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }

    public static function executeSQL($sql) {
        $conn = self::getConnection();
        if(!mysqli_query($conn, $sql)) {
            throw new Exception(mysqli_error($conn));
        }
        $id = $conn->insert_id;
        $conn->close();
        return $id;
    }
}