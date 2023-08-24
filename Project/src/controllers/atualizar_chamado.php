<?php 
session_start();
requireValidSession();

$exception = null;

if(count($_POST) > 0){
    try {
        $chamado = new Chamados($_POST); 
        if($chamado->chamado_id) {
            $chamado->update();
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}

loadTemplateView('atualizar_chamado');

print_r($_POST);
echo '<br>';
print_r($chamado);