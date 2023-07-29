<?php

//arquivo "boot" da aplicação que fornece 
//os requires necessários para toda a aplicação 
require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if($uri === '/' || $uri === '' || $uri === '/index.php') {
    $uri = 'login.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");
?>
