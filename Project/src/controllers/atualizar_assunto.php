<?php 
session_start();
requireValidSession(true);

$exception = null;

$assuntoData = [];

if(count($_POST) > 0){
    try {
        $assunto = new Assuntos($_POST); 
        $assuntoData = $assunto->getValues();
        $_POST = $assuntoData;
        if($assunto->assunto_id) {
            $assunto->update($assunto->assunto_id);    
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}


if($exception) {
    loadTemplateView('editar_assunto', $_POST + ['exception' => $exception]);
} else {
    loadTemplateView('atualizar_assunto', $_POST);
}

