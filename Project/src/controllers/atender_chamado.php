<?php 
session_start();
requireValidSession();

loadModel('Setores');

$users = User::get();
$chamadoData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $chamado = Chamados::getOne(['chamado_id' => $_GET['update']]);
    $chamadoData = $chamado->getValues();
    $_POST = $chamadoData; 
}


loadTemplateView('atender_chamado', $_POST + ['usuarios' => $users]);

print_r($users); 
echo '<br>';
print_r($chamado); 
echo '<br>';
print_r($chamadoData);
echo '<br>';
print_r($_GET['update']);