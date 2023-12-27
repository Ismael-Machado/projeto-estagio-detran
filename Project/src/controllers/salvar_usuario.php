<?php 
session_start();
requireValidSession(true);

loadModel('User');


$exception = null;
if(count($_POST) > 0){
    try {
        $usuario = new User($_POST); 
        $id = $usuario->insert();
        $usuario->setId($id);
    } catch(Exception $e) {
        $exception = $e;
    }
}

if($exception) {
    loadTemplateView('novo_usuario', $_POST + ['exception' => $exception]);
} else {
    loadTemplateView('salvar_usuario', ['exception' => $exception]);
}