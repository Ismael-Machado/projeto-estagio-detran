<?php 
session_start();
requireValidSession(true);

$usuarios = User::get();

loadTemplateView('lista_usuarios', ['usuarios' => $usuarios]);