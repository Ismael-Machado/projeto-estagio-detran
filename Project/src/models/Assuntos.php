<?php 

class Assuntos extends Model {
    protected static $tableName = 'assuntos';
    protected static $columns = [
        'assunto_id',
        'assunto_nome',
        'assunto_is_ativo',
    ];

    public function update($id) {
        $this->assunto_is_ativo = $this->assunto_is_ativo ? 1 : 0;        
        
        return parent::update($id);
    }

    public function setId($id) {
        $this->assunto_id = $id;
    }
}

