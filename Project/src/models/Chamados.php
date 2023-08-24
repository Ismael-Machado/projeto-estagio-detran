<?php 

class Chamados extends Model {
    protected static $tableName = 'chamados';
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

        
    // função atender chamado que é invocada quando o usuário logado 
    // clica em atender chamado. Se o usuário for admin, poderá escolher 
    // qual usuário do banco vai atender o chamado. 
    public function atenderChamado() {

    }

    public function insert() {
        if($this->chamado_setor == 1) {
            $this->setor_id_fk = 1;
            $this->chamado_setor = "Divisão de Arquivo";
        } elseif($this->chamado_setor == 2) {
            $this->setor_id_fk = 2;
            $this->chamado_setor = "Divisão de Serviços Gerais";
        } elseif($this->chamado_setor == 3) {
            $this->setor_id_fk = 3;
            $this->chamado_setor = "Divisão de Almoxarifado";  
        }

        if($this->chamado_assunto == 1) {
            $this->chamado_assunto = "Internet";
        } elseif($this->chamado_assunto == 2) {
            $this->chamado_assunto = "Monitor";
        } elseif($this->chamado_assunto == 3) {
            $this->chamado_assunto = "Outro";  
        }

        if(!$this->chamado_criado_em) {
            // $data = new DateTime("now");
            //arrumar essa parte do date 
            $this->chamado_criado_em = "2023-08-23 09:30:00";
        }

        if(!$this->chamado_status) {
            $this->chamado_status = "Aberto";
        }

        if(!$this->usuario_id_fk) {
            $this->usuario_id_fk = 1;
        } 


        return parent::insert();
    }

    public function setId($id) {
        $this->chamado_id = $id;
    }
}