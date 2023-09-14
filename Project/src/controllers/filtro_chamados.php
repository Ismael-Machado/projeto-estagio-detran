<?php 
session_start();
requireValidSession();

$registries = Chamados::getChamadosPorMes(new DateTime());

loadTemplateView('filtro_chamados', [
    'registries' => $registries
]);