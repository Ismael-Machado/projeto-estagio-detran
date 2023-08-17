<?php 

class Setores extends Model {
    protected static $tableName = 'usuarios';
    protected static $columns = [
        'setor_id',
        'setor_nome',
        'setor_is_ativo',
    ];
}

