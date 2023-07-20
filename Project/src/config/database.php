<?php 

// classe responsável pelas definições de conexão com o banco de dados 
// uso de nomeclaturas em inglês (nome de funções, variáveis, etc) como padrão

class Database {
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
}