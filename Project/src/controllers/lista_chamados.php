<?php 
session_start();
requireValidSession();

$chamados = Chamados::get();
$usuarios = User::get();

loadTemplateView('lista_chamados', ['chamados' => $chamados, 'usuarios' => $usuarios]);