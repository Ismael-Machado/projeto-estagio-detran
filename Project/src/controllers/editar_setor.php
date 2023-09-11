<?php 
session_start();
requireValidSession();

$setorData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $setor = Setores::getOne(['setor_id' => $_GET['update']]);
    $setorData = $setor->getValues();
    $_POST = $setorData; 
}


loadTemplateView('editar_setor', $_POST + ['setor' => $setorData]);