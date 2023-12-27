<?php 
session_start();
requireValidSession(true);

$setores = Setores::get();

loadTemplateView('lista_setores', ['setores' => $setores]);