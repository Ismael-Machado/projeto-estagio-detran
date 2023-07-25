<?php
require_once(dirname(__FILE__, 2) . '/src/config/database.php');
require_once(dirname(__FILE__, 2) . '/src/views/login.php');

//arquivo "boot" da aplicação que fornece 
//os requires necessários para toda a aplicação 
require_once(dirname(__FILE__, 2) . '/src/config/config.php');

//teste classe user
$user = new User();

// teste de conexão
Database::getConnection();

?>
