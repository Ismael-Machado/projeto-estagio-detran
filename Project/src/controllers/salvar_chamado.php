<?php 
session_start();
requireValidSession();

loadModel('Chamados');



// $exception = null;
// if(count($_POST) > 0){
//     try {
//         $chamado = new Chamados($_POST); 
//         $chamado->insert();
//     } catch(Exception $e) {
//         $exception = $e;
//     }
// }

$chamado = new Chamados([
    'chamado_id' => 1,
    'chamado_setor' => "Teste",
    'chamado_solicitante' => "Teste",
    'chamado_email_solicitante' => "Teste",
    'chamado_assunto' => "Teste",
    'chamado_descricao' => "Teste",
    'chamado_criado_em' => "Teste",
    'chamado_status' => "Teste",
    'usuario_id_fk' => 1,
    'setor_id_fk' => 1,
]);

$chamadoPost = new Chamados($_POST);

// print_r($chamado);
print_r($chamadoPost);


loadTemplateView('salvar_chamado', ['chamados' => $chamado]);