<?php 
session_start();
requireValidSession();

$exception = null;

loadModel('Setores');

$users = User::get();
$setores = Setores::get();
$chamadoData = [];

if(isset($_GET['update'])) {
    $chamado = Chamados::getOne(['chamado_id' => $_GET['update']]);
    $chamadoData = $chamado->getValues();
    $_POST = $chamadoData; 
}


if(count($_POST) > 0){
    try {
        $chamado = new Chamados($_POST); 
        if($chamado->chamado_id) {
            $chamado->editar($chamado->chamado_id);
        }
        
    } catch(Exception $e) {
        $exception = $e;
    }
}

if($exception) {
    loadTemplateView('editar_chamado', $_POST + ['usuarios' => $users, 'setores' => $setores, 'exception' => $exception]);
} else {
    loadTemplateView('atualizar_editar_chamado');
}

print_r($_POST);
echo '<br>';
print_r($chamado);