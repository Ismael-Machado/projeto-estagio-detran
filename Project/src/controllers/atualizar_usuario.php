<?php 
session_start();
requireValidSession();

$exception = null;

$usuarioData = [];

if(count($_POST) > 0){
    try {
        $usuario = new User($_POST); 
        if($usuario->usuario_id) {
            $usuario->update($usuario->usuario_id);
            $usuarioData = $usuario->getValues();
            $_POST = $usuarioData;
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}



loadTemplateView('atualizar_usuario', $_POST);

// print_r($_POST);
// print_r($usuario);