<?php 
session_start();
//para abrir página de solicitação de chamado sem a necessidade de login
// requireValidSession();

loadModel('Setores');

$setores = Setores::get();
$assuntos = Assuntos::get();

loadTemplateView('chamados', ['setores' => $setores, 'assuntos' => $assuntos]);