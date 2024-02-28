<?php 
session_start();
requireValidSession();



$result = Chamados::getTotalChamadosNoDia();
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

//obtendo os parâmetros de data
$date = new DateTime();
$today = $date->format('Y-m-d');


$chamados = Chamados::get(["raw" => "chamado_criado_em >= '{$today}'","order" => "order by chamado_id desc limit {$limit} offset {$offset}"]);
$usuarios = User::get();

loadTemplateView('lista_chamados_dia', ['chamados' => $chamados, 'usuarios' => $usuarios, 'pagination' => $pagination]);