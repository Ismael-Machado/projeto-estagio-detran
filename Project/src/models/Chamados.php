<?php 

class Chamados extends Model {
    protected static $tableName = 'usuarios';
    protected static $columns = [
        'chamado_id',
        'chamado_setor',
        'chamado_solicitante',
        'chamado_email_solicitante',
        'chamado_assunto',
        'chamado_descricao',
        'chamado_criado_em',
        'chamado_status',
        'usuario_id_fk',
        'setor_id_fk',
    ];
    
}

