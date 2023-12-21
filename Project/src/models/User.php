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
    
    public function insert() {
        $this->validate();

        $this->usuario_senha = password_hash($this->usuario_senha, PASSWORD_DEFAULT);
        $this->usuario_is_admin = $this->usuario_is_admin ? 1 : 0;
        
        if(!$this->usuario_criado_em) {
            $data = new DateTime('now');
            $dataFormatada = $data->format('Y-m-d H:i:s');
            $this->usuario_criado_em = $dataFormatada;
        }

        return parent::insert();
    }

    public function update($id) {
        $this->validateUpdate();

        $this->usuario_is_admin = $this->usuario_is_admin ? 1 : 0;
        $this->usuario_is_ativo = $this->usuario_is_ativo ? 1 : 0;    

        if($this->nova_senha) {
            $this->usuario_senha = password_hash($this->nova_senha, PASSWORD_DEFAULT);
        }

        return parent::update($id);
    }

    public function setId($id) {
        $this->usuario_id = $id;
    }

    private function validate() {
        $errors = [];

        if(!$this->usuario_nome) {
            $errors['usuario_nome'] = 'Nome é um campo abrigatório.';
        }

        if(!$this->usuario_email) {
            $errors['usuario_email'] = 'E-mail é um campo obrigatório';
        } elseif(!filter_var($this->usuario_email, FILTER_VALIDATE_EMAIL)) {
            $errors['usuario_email'] = 'Forneça um formato de e-mail válido.';
        }

        if(!$this->usuario_senha) {
            $errors['usuario_senha'] = 'Senha é um campo abrigatório.';
        }

        if(!$this->confirma_senha) {
            $errors['confirma_senha'] = 'Confirmação de Senha é um campo abrigatório.';
        }

        if($this->usuario_senha && $this->confirma_senha 
            && $this->usuario_senha !== $this->confirma_senha) {
            $errors['usuario_senha'] = 'As senhas não são iguais.';
            $errors['confirma_senha'] = 'As senhas não são iguais.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    private function validateUpdate() {
        $errors = [];

        if(!$this->usuario_nome) {
            $errors['usuario_nome'] = 'Nome é um campo abrigatório.';
        }

        if(!$this->usuario_email) {
            $errors['usuario_email'] = 'E-mail é um campo obrigatório';
        } elseif(!filter_var($this->usuario_email, FILTER_VALIDATE_EMAIL)) {
            $errors['usuario_email'] = 'Forneça um formato de e-mail válido.';
        }
        
        if($this->nova_senha && $this->confirma_senha 
            && $this->nova_senha !== $this->confirma_senha) {
            $errors['nova_senha'] = 'As senhas não são iguais.';
            $errors['confirma_senha'] = 'As senhas não são iguais.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
}