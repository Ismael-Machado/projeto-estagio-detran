<?php 
session_start();
requireValidSession(true);

loadModel('Setores');

$users = User::get();
$setores = Setores::get();
$chamadoData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $chamado = Chamados::getOne(['chamado_id' => $_GET['update']]);
    $chamadoData = $chamado->getValues();
    $_POST = $chamadoData; 
}


loadTemplateView('editar_chamado', $_POST + ['usuarios' => $users, 'setores' => $setores]);