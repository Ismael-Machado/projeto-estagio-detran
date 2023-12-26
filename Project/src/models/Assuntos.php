<?php 

class Assuntos extends Model {
    protected static $tableName = 'assuntos';
    protected static $columns = [
        'assunto_id',
        'assunto_nome',
        'assunto_is_ativo',
    ];

    public function insert() {
        $this->validate();

        return parent::insert();
    }

    public function update($id) {
        $this->validate();
        $this->assunto_is_ativo = $this->assunto_is_ativo ? 1 : 0;        
        
        return parent::update($id);
    }

    public function setId($id) {
        $this->assunto_id = $id;
    }

    private function validate() {
        $errors = [];

        if(!$this->assunto_nome) {
            $errors['assunto_nome'] = 'Nome é um campo abrigatório.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
    
}

