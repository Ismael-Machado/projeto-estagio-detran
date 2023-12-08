<?php 
session_start();
requireValidSession();

$limite = 7;
$tamanho = 7;

if(isset($_GET['page'])) {
    $tamanho = $_GET['page'];
}

$chamados = Chamados::get(["order" => "limit {$limite} offset {$tamanho}"]);
$usuarios = User::get();

loadTemplateView('lista_chamados', ['chamados' => $chamados, 'usuarios' => $usuarios]);