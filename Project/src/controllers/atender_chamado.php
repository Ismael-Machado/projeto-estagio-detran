<?php 
session_start();
requireValidSession();

loadModel('Setores');

$users = User::get();
$chamadoData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $chamado = Chamados::getOne(['chamado_id' => $_GET['update']]);
    $chamadoData = $chamado->getValues();

}

loadTemplateView('atender_chamado', $chamadoData + ['usuarios' => $users]);