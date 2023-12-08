<?php 
session_start();

//para abrir página de solicitação de chamado sem a necessidade de login
loadModel('Setores');

$setores = Setores::get();

loadTemplateView('abrir_chamado', ['setores' => $setores]);