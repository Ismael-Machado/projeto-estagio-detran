<?php 
session_start();
requireValidSession();

$assuntoData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $assunto = Assuntos::getOne(['assunto_id' => $_GET['update']]);
    $assuntoData = $assunto->getValues();
    $_POST = $assuntoData; 
}


loadTemplateView('editar_assunto', $_POST + ['assunto' => $assuntoData]);