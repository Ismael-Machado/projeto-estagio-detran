<?php 
session_start();
requireValidSession();

$usuarios = User::get();

loadTemplateView('lista_usuarios', ['usuarios' => $usuarios]);