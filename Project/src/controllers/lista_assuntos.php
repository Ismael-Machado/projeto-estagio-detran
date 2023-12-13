<?php 
session_start();
requireValidSession();


$assuntos = Assuntos::get();

loadTemplateView('lista_assuntos', ['assuntos' => $assuntos]);