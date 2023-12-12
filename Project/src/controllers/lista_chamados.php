<?php 
session_start();
requireValidSession();

// $limite = 7;
// $tamanho = 7;

$result = Chamados::getTotalChamados();
$totalItems = $result['count(chamado_id)'];

$pagination = new Pagination;
$pagination->setTotalItems($totalItems);
// $offset = $pagination->calculations();

if(isset($_GET['page'])) {
    $currentPage = $_GET['page'];
    $offset = $pagination->calculations($currentPage);
} else {
    $currentPage = 1;
    $offset = $pagination->calculations($currentPage);
}

$limit = $pagination->getItemsPerPage();

// funcionando!! 
// ajustar a variável totalItems e apresentar de forma desc -> update: ajustado 
// bugou o menu lateral *o* -> update: ajustado
$chamados = Chamados::get(["order" => "order by chamado_id desc limit {$limit} offset {$offset}"]);
$usuarios = User::get();

loadTemplateView('lista_chamados', ['chamados' => $chamados, 'usuarios' => $usuarios, 'pagination' => $pagination]);