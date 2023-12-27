<?php 
session_start();
requireValidSession(true);


$assuntos = Assuntos::get();

loadTemplateView('lista_assuntos', ['assuntos' => $assuntos]);