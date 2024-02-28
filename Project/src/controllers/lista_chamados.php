<?php 
session_start();
requireValidSession();



$result = Chamados::getTotalChamados();
$totalItems = $result['count(chamado_id)'];

$pagination = new Pagination;
$pagination->setTotalItems($totalItems);

if(isset($_GET['page'])) {
    $currentPage = $_GET['page'];
    $offset = $pagination->calculations($currentPage);
} else {
    $currentPage = 1;
    $offset = $pagination->calculations($currentPage);
}

$limit = $pagination->getItemsPerPage();


$chamados = Chamados::get(["order" => "order by chamado_id desc limit {$limit} offset {$offset}"]);
$usuarios = User::get();

loadTemplateView('lista_chamados', ['chamados' => $chamados, 'usuarios' => $usuarios, 'pagination' => $pagination]);