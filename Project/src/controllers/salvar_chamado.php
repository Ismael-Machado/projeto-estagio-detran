<?php 
loadModel('Chamados');
loadTemplateView('salvar_chamado');
session_start();

$exception = null;

$array = $_POST;

print_r($array);

loadTemplateView('salvar_chamado', $_POST);