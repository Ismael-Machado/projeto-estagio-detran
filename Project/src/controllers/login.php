<?php 
loadModel('Login');

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        echo "Usuário {$user->usuario_nome} logado com sucesso!";
    } catch (AppException $e) {
        echo $e->getMessage();
    }
}

loadView('login', $_POST);
