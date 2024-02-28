<?php 
session_start();
requireValidSession();

$exception = null;

$chamadoData = [];

if(count($_POST) > 0){
    try {
        $chamado = new Chamados($_POST); 
        if($chamado->chamado_id) {
            $chamado->update($chamado->chamado_id);
            $chamadoData = $chamado->getValues();
            $_POST = $chamadoData;
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}



loadTemplateView('atualizar_chamado', $_POST);


