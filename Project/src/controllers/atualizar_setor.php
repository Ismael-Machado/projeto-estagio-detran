<?php 
session_start();
requireValidSession();

$exception = null;

$setorData = [];

if(count($_POST) > 0){
    try {
        $setor = new Setores($_POST); 
        if($setor->setor_id) {
            $setor->update($setor->setor_id);
            $setorData = $setor->getValues();
            $_POST = $setorData;
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}



loadTemplateView('atualizar_setor', $_POST);

