<?php 
session_start();
requireValidSession();

loadModel('Setores');

$setores = Setores::get();

loadTemplateView('chamados', ['setores' => $setores]);