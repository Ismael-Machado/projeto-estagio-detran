<?php 
session_start();
requireValidSession(true);


$totalChamados = Chamados::getTotalChamados();
$totalChamadosAtendidos = Chamados::getCountChamadosAtendidos();
$totalChamadosAbertos = Chamados::getCountChamadosAbertosNoDia();

loadTemplateView('relatorio_chamados', 
    ['totalChamados' => $totalChamados, 
    'totalChamadosAtendidos' => $totalChamadosAtendidos, 
    'totalChamadosAbertos' => $totalChamadosAbertos
    ]);

