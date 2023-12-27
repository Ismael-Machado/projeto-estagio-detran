<?php 
session_start();
requireValidSession(true);

$exception = null;

$setorData = [];

if(count($_POST) > 0){
    try {
        $setor = new Setores($_POST); 
        $setorData = $setor->getValues();
        $_POST = $setorData;
        if($setor->setor_id) {
            $setor->update($setor->setor_id);
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}


if($exception) {
    loadTemplateView('editar_setor', $_POST + ['exception' => $exception]);
} else {
    loadTemplateView('atualizar_setor', $_POST);
}

