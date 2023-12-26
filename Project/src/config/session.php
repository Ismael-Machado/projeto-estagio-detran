<?php 

function requireValidSession($requiresAdmin = false) {
    $user = $_SESSION['user'];
    if(!isset($user)) {
        header('Location: login.php');
        exit();
    } elseif($requiresAdmin && !$user->usuario_is_admin) {
        addErrorMsg('Acesso negado!');
        header('Location: chamados.php');
        exit();
    }
}