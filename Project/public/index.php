<?php
require_once(dirname(__FILE__, 2) . '/src/config/database.php');
// require_once(dirname(__FILE__, 2) . '/src/views/login.php');
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(CONTROLLER_PATH . '/login.php');
// loadView('login');

//arquivo "boot" da aplicação que fornece 
//os requires necessários para toda a aplicação 

//teste login 
// $login = new Login([
//     'usuario_email' => 'paulinho@ac.gov.br',
//     'usuario_senha' => 'a'
// ]);

// try {
//     $login->checkLogin();
//     echo 'Deu certo, mano!';
// } catch(Exception $e) {
//     echo 'deu ruim :(';
// }
//parei na parte de testar login 
?>
