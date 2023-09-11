<?php 

class Setores extends Model {
    protected static $tableName = 'setores';
    protected static $columns = [
        'setor_id',
        'setor_nome',
        'setor_is_ativo',
    ];

    public function update($id) {
        $this->setor_is_ativo = $this->setor_is_ativo ? 1 : 0;        
        
        return parent::update($id);
    }

    public function setId($id) {
        $this->setor_id = $id;
    }
}

