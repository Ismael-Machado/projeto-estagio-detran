<?php 
session_start();
requireValidSession();

print_r($_SESSION['user']->usuario_id);

echo("<br>");
echo("Testando função para retornar o primerio dia útil do mês.");
echo("<br>");
print_r(getFirstDayOfMonth('2023-02-10'));
echo("<br>");
echo("Testando função para retornar o último dia útil do mês.");
echo("<br>");
print_r(getLastDayOfMonth('2023-02-10'));