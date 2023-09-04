<?php 
session_start();
requireValidSession();

$chamadoData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $chamado = Chamados::getOne(['chamado_id' => $_GET['update']]);
    $chamadoData = $chamado->getValues();
    $_POST = $chamadoData; 
}


loadTemplateView('finalizar_chamado', $_POST);