<?php 
session_start();


loadModel('Setores');

$setores = Setores::get();
$assuntos = Assuntos::get();
$chamadoData = [];

$exception = null;
if(count($_POST) > 0){
    try {
        $chamado = new Chamados($_POST); 
                
        $id = $chamado->insert();
        $chamado->setId($id);
    } catch(Exception $e) {
        $exception = $e;
    }
}

if($id) {
    $chamadoTemp = Chamados::getOne(['chamado_id' => $id]);
    $chamadoData = $chamadoTemp->getValues();
}

$data = new DateTime('now');
$dataFormatada = $data->format('Y-m-d H:i:s');



if($exception) {
    loadTemplateView('chamados', ['id' => $id, 'exception' => $exception, 'setores' => $setores, 'assuntos' => $assuntos]);
} else {
    loadTemplateView('salvar_chamado', ['hash' => $hash, 'exception' => $exception, 'chamadoData' => $chamadoData]);
}