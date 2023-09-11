<?php 
session_start();
requireValidSession();

$setores = Setores::get();

loadTemplateView('lista_setores', ['setores' => $setores]);