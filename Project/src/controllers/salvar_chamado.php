<?php 
loadModel('Chamados');
loadTemplateView('salvar_chamado');
session_start();

$exception = null;

if(count($_POST) > 0) {
    try {
        $chamado = new Chamados($_POST);
        $chamado->save();
    } catch(Exception $e) {
        $exception = $e;
    }
}