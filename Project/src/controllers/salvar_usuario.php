<?php 
session_start();
requireValidSession();

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

loadTemplateView('salvar_usuario', ['exception' => $exception]);