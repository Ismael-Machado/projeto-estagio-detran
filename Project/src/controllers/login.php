<?php 
loadModel('Login');
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        echo "Usuário {$user->usuario_nome} logado com sucesso!";
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);
