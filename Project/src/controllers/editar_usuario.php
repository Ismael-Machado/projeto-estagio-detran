<?php 
session_start();
requireValidSession();

$usuarioData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $usuario = User::getOne(['usuario_id' => $_GET['update']]);
    $usuarioData = $usuario->getValues();
    $dataFormatada = strtotime($usuarioData['usuario_criado_em']);
    $data = date('Y-m-d', $dataFormatada);
    $_POST = $usuarioData; 
}


loadTemplateView('editar_usuario', $_POST + ['usuario' => $usuarioData, 'data' => $data]);