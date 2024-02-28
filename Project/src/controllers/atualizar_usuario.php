<?php 
session_start();
requireValidSession();

$exception = null;

$usuarioData = [];

if(count($_POST) > 0){
    try {
        $usuario = new User($_POST); 
        $usuarioData = $usuario->getValues();
        $_POST = $usuarioData;
        if($usuario->usuario_id) {
            $usuario->update($usuario->usuario_id);
            
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}


if($exception) {
    loadTemplateView('editar_usuario', $_POST + ['usuario' => $usuarioData, 'data' => $data, 'exception' => $exception]);
} else {
    loadTemplateView('atualizar_usuario', $_POST);
}

