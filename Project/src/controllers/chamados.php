<?php 
session_start();
requireValidSession();

loadModel('Setores');

$setores = Setores::get();
$assuntos = Assuntos::get();

loadTemplateView('chamados', ['setores' => $setores, 'assuntos' => $assuntos]);