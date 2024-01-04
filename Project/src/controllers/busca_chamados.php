<?php 
session_start();
// requireValidSession(true);


$chamadoData = [];    

if(count($_POST) > 0){
    try {
        $chamado = Chamados::getOne(['chamado_token' => $_POST['chamado_token']]);
    } catch(Exception $e) {
        $exception = $e;
    }       
} 
if($chamado) {
    $chamadoData = $chamado->getValues(); 
}
loadTemplateView('busca_chamados', [
    'chamadoData' => $chamadoData
]);