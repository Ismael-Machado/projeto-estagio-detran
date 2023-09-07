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
        $this->usuario_senha = password_hash($this->password, PASSWORD_DEFAULT);
        $this->usuario_is_admin = $this->usuario_is_admin ? 1 : 0;
        
        if(!$this->usuario_criado_em) {
            $data = new DateTime('now');
            $dataFormatada = $data->format('Y-m-d H:i:s');
            $this->usuario_criado_em = $dataFormatada;
        }

        return parent::insert();
    }

    public function setId($id) {
        $this->usuario_id = $id;
    }
}