<?php 
session_start();
requireValidSession();

$exception = null;

$assuntoData = [];

if(count($_POST) > 0){
    try {
        $assunto = new Assuntos($_POST); 
        if($assunto->assunto_id) {
            $assunto->update($assunto->assunto_id);
            $assuntoData = $assunto->getValues();
            $_POST = $assuntoData;
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}



loadTemplateView('atualizar_assunto', $_POST);

