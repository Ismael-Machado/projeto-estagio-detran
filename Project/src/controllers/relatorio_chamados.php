<?php 
session_start();
requireValidSession();

$totalChamados = Chamados::getTotalChamados();
$totalChamadosAtendidos = Chamados::getCountChamadosAtendidos();
$totalChamadosAbertos = Chamados::getCountChamadosAbertos();

loadTemplateView('relatorio_chamados', 
    ['totalChamados' => $totalChamados, 
    'totalChamadosAtendidos' => $totalChamadosAtendidos, 
    'totalChamadosAbertos' => $totalChamadosAbertos
    ]);

