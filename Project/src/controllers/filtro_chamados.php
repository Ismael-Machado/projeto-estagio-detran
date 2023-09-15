<?php 
session_start();
requireValidSession();

$currentDate = new DateTime();

$registries = Chamados::getChamadosPorMes($currentDate);

loadTemplateView('filtro_chamados', [
    'registries' => $registries
]);