<?php 
session_start();
requireValidSession();

loadModel('User');


$exception = null;
if(count($_POST) > 0){
    try {
        $assunto = new Assuntos($_POST); 
        $id = $assunto->insert();
        $assunto->setId($id);
    } catch(Exception $e) {
        $exception = $e;
    }
}

loadTemplateView('salvar_assunto', ['exception' => $exception]);