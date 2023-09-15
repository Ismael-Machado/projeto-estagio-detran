<?php 
session_start();
requireValidSession();

$dataCorrente = new DateTime();

$usuario = $_SESSION['user'];
$usuarioIdSelecionado = $usuario->usuario_id;
$usuarios = null;
if ($usuario->usuario_is_admin) {
    $usuarios = User::get();
    $usuarioIdSelecionado = $_POST['user'] ? $_POST['user'] : $usuario->usuario_id;
}

$periodoSelecionado = $_POST['periodo'] ? $_POST['periodo'] : $dataCorrente->format('Y-m');
$periodos = [];
// Loop para gerar os options da seleção de períodos
for ($anoDiferenca = 0; $anoDiferenca <= 1; $anoDiferenca++) {
    $ano = date('Y') - $anoDiferenca;
    for ($mes = 12; $mes >=1; $mes--) {
        $date = new DateTime("{$ano}-{$mes}-1");
        $periodos[$date->format('Y-m')] = strftime('%B de %Y', $date->getTimestamp());
    }
}

$registros = Chamados::getChamadosPorMes($dataCorrente);


loadTemplateView('filtro_chamados', [
    'registros' => $registros,
    'periodos' => $periodos,
    'periodoSelecionado' => $periodoSelecionado,
    'usuarios' => $usuarios,
    'usuarioIdSelecionado' => $usuarioIdSelecionado
]);