<?php 
session_start();
// requireValidSession();
// tirei o required daqui pra dá de solicitar chamado sem precisar estar logado

loadModel('Setores');

$setores = Setores::get();
$assuntos = Assuntos::get();


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

$data = new DateTime('now');
$dataFormatada = $data->format('Y-m-d H:i:s');

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
print_r($data);

if($exception) {
    loadTemplateView('chamados', ['id' => $id, 'exception' => $exception, 'setores' => $setores, 'assuntos' => $assuntos]);
} else {
    loadTemplateView('salvar_chamado', ['id' => $id, 'exception' => $exception]);
}