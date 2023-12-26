<?php 

class Setores extends Model {
    protected static $tableName = 'setores';
    protected static $columns = [
        'setor_id',
        'setor_nome',
        'setor_is_ativo',
    ];

    public function insert() {
        $this->validate();

        return parent::insert();
    }

    public function update($id) {
        $this->validate();
        $this->setor_is_ativo = $this->setor_is_ativo ? 1 : 0;        
        
        return parent::update($id);
    }

    public function setId($id) {
        $this->setor_id = $id;
    }

    private function validate() {
        $errors = [];

        if(!$this->setor_nome) {
            $errors['setor_nome'] = 'Nome é um campo abrigatório.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
}

