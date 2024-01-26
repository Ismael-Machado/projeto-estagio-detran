<?php 
session_start();
// requireValidSession();
// tirei o required daqui pra dá de solicitar chamado sem precisar estar logado

loadModel('Setores');

$setores = Setores::get();
$assuntos = Assuntos::get();
$chamadoData = [];

$exception = null;
if(count($_POST) > 0){
    try {
        $chamado = new Chamados($_POST); 
        
        // $chamado->insert();

        //além de retornar o id, a função insert deve retornar um hash para apresentar na view 
        //e ser utilizado para posterior consulta
        $id = $chamado->insert();
        $chamado->setId($id);
    } catch(Exception $e) {
        $exception = $e;
    }
}

if($id) {
    $chamadoTemp = Chamados::getOne(['chamado_id' => $id]);
    $chamadoData = $chamadoTemp->getValues();
}

$data = new DateTime('now');
$dataFormatada = $data->format('Y-m-d H:i:s');

// $hash = base64_encode($id);

// $chamado = new Chamados([
//     'chamado_id' => 1,
//     'chamado_setor' => "Teste",
//     'chamado_solicitante' => "Teste",
//     'chamado_email_solicitante' => "Teste",
//     'chamado_assunto' => "Teste",
//     'chamado_descricao' => "Teste",
//     'chamado_criado_em' => "Teste",
//     'chamado_status' => "Teste",
//     'usuario_id_fk' => 1,
//     'setor_id_fk' => 1,
// ]);

// $chamadoPost = new Chamados($_POST);

// print_r($chamado);
// print_r($data);

if($exception) {
    loadTemplateView('chamados', ['id' => $id, 'exception' => $exception, 'setores' => $setores, 'assuntos' => $assuntos]);
} else {
    loadTemplateView('salvar_chamado', ['hash' => $hash, 'exception' => $exception, 'chamadoData' => $chamadoData]);
}