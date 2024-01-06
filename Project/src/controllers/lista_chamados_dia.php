<?php 
session_start();
requireValidSession();

// $limite = 7;
// $tamanho = 7;

$result = Chamados::getTotalChamadosNoDia();
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

//obtendo os parâmetros de data
$date = new DateTime();
$today = $date->format('Y-m-d');

// funcionando!! 
// ajustar a variável totalItems e apresentar de forma desc -> update: ajustado 
// bugou o menu lateral *o* -> update: ajustado
$chamados = Chamados::get(["raw" => "chamado_criado_em >= '{$today}'","order" => "order by chamado_id desc limit {$limit} offset {$offset}"]);
$usuarios = User::get();

loadTemplateView('lista_chamados_dia', ['chamados' => $chamados, 'usuarios' => $usuarios, 'pagination' => $pagination]);