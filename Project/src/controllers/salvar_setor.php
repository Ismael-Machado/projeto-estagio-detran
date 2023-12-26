<?php 
session_start();
requireValidSession();

loadModel('User');


$exception = null;
if(count($_POST) > 0){
    try {
        $setor = new Setores($_POST); 
        $id = $setor->insert();
        $setor->setId($id);
    } catch(Exception $e) {
        $exception = $e;
    }
}

if($exception) {
    loadTemplateView('novo_setor', ['exception' => $exception]);
} else {
    loadTemplateView('salvar_setor', ['exception' => $exception]);
}