<?php 


class User extends Model {
    protected static $tableName = 'usuarios';
    protected static $columns = [
        'usuario_id',
        'usuario_nome',
        'usuario_senha',
        'usuario_email',
        'usuario_criado_em',
        'usuario_is_ativo',
        'usuario_is_admin',
    ];
    
}