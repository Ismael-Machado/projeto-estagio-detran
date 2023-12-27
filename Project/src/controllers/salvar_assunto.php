<?php 
session_start();
requireValidSession(true);

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

if($exception) {
    loadTemplateView('novo_assunto', ['exception' => $exception]);
} else {
    loadTemplateView('salvar_assunto', ['exception' => $exception]);
}