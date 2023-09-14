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

$totalChamadosAtendidos = Chamados::getCountChamadosAtendidos();
$totalChamadosAbertos = Chamados::getCountChamadosAbertos();

$atendidos = $totalChamadosAtendidos['count(chamado_id)'];
$abertos =  $totalChamadosAbertos['count(chamado_id)'];

$chamados = ['atendidos' => $atendidos, 'abertos' => $abertos];

echo json_encode($chamados);