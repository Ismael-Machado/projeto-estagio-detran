<?php 
session_start();
requireValidSession();

$chamados = Chamados::get();

loadTemplateView('lista_chamados', ['chamados' => $chamados]);