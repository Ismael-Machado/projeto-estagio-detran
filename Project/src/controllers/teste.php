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

$totalChamadosAbertos = Chamados::getChamadosAbertosNoDia();
$totalChamadosAtendidos = Chamados::getChamadosAtendidosNoDia();
$totalChamadosFinalizados = Chamados::getChamadosFinalizadosNoDia();

$abertos = $totalChamadosAbertos['count(chamado_id)'];
$atendidos = $totalChamadosAtendidos['count(chamado_id)'];
$finalizados = $totalChamadosFinalizados['count(chamado_id)'];

$totalAtendidos = $atendidos + $finalizados;

$total = "" . $totalAtendidos;

// echo $abertos;
// echo '<br>';
// echo $atendidos;
// echo '<br>';
// echo $finalizados;
// echo '<br>';
// echo $totalAtendidos;
// $abertos =  $totalChamadosAbertos['count(chamado_id)'];

//os parâmetros tem que ser string
$chamados = ['total' => $total, 'abertos' => $abertos];

//carrega os valores para a função recuperarQtd do arquivo script.js
//a função carrega os valores dos widgets do menu lateral
echo json_encode($chamados);

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

// $now = new DateTime();
// $lastMonth = $now->sub(new DateInterval('P1M'));
// echo $lastMonth->format('Y-m-d');