<?php 
session_start();
requireValidSession();

$totalChamadosAbertos = Chamados::getChamadosAbertosNoDia();
$totalChamadosAtendidos = Chamados::getChamadosAtendidosNoDia();
$totalChamadosFinalizados = Chamados::getChamadosFinalizadosNoDia();

$abertos = $totalChamadosAbertos['count(chamado_id)'];
$atendidos = $totalChamadosAtendidos['count(chamado_id)'];
$finalizados = $totalChamadosFinalizados['count(chamado_id)'];

$totalAtendidos = $atendidos + $finalizados;

$total = "" . $totalAtendidos;



//os parâmetros tem que ser string
$chamados = ['total' => $total, 'abertos' => $abertos];

//carrega os valores para a função recuperarQtd do arquivo script.js
//a função carrega os valores dos widgets do menu lateral
echo json_encode($chamados);

