<?php 
session_start();
requireValidSession();

// print_r($_SESSION['user']->usuario_id);

// $totalChamados = Chamados::getTotalChamados();
// print_r($totalChamados);

// echo("<br>");
// echo("<br>");
// echo("Testando função para retornar o primeiro dia útil do mês.");
// echo("<br>");
// print_r(getFirstDayOfMonth('2023-02'));
// echo("<br>");
// echo("Testando função para retornar o último dia útil do mês.");
// echo("<br>");
// print_r(getLastDayOfMonth('2023-02'));

// $totalChamadosAtendidos = Chamados::getCountChamadosAtendidos();
// $totalChamadosAbertos = Chamados::getCountChamadosAbertos();

$atendidos = $totalChamadosAtendidos['count(chamado_id)'];
$abertos =  $totalChamadosAbertos['count(chamado_id)'];

// $chamados = ['atendidos' => $atendidos, 'abertos' => $abertos];

// echo json_encode($chamados);

// $result = Chamados::getTotalChamados();
// $totalItems = $result['count(chamado_id)'];

// $pagination = new Pagination();
// $pagination->setTotalItems($totalItems);
// // $offset = $pagination->calculations();

// if(isset($_GET['page'])) {
//     $currentPage = $_GET['page'];
//     $offset = $pagination->calculations($currentPage);
// } else {
//     $currentPage = 1;
//     $offset = $pagination->calculations($currentPage);
// }

// $limit = $pagination->getItemsPerPage();

// print_r($currentPage);
// var_dump($_SESSION);

// $assunto = Assuntos::getOne(['assunto_id' => 1]);
// echo $assunto->assunto_nome . "<br>";
// print_r($assunto);

// print_r($_SESSION['user']->usuario_id);

