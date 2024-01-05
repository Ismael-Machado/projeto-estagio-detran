<?php 

function loadModel($modelName) {
    require_once(MODEL_PATH . "/{$modelName}.php");
} 

function loadView($viewName, $params = array()) {

    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }
    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = array()) {

    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }

    //por enquanto, não serve de nd isso aqui
    $totalChamadosAtendidos = Chamados::getCountChamadosAtendidos();
    $totalChamadosAbertos = Chamados::getCountChamadosAbertos();

    //carrega esses valores para serem utilizados nos widgets do menu lateral
    //caso a função recuperarQtd do arquivo script.js não funcionar
    $totalChamadosAbertosDia = Chamados::getChamadosAbertosNoDia();
    $totalChamadosAtendidosDia = Chamados::getChamadosAtendidosNoDia();
    $totalChamadosFinalizadosDia = Chamados::getChamadosFinalizadosNoDia();

    $abertos = $totalChamadosAbertosDia['count(chamado_id)'];
    $atendidos = $totalChamadosAtendidosDia['count(chamado_id)'];
    $finalizados = $totalChamadosFinalizadosDia['count(chamado_id)'];

    $total = $atendidos + $finalizados;

    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/menu.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");
}

function renderTitle($title, $subtitle, $icon = null) {
    require_once(TEMPLATE_PATH . "/title.php");
}