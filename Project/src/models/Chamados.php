<?php 
loadModel('Setores');

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
        'chamado_token',
        'usuario_id_fk',
        'setor_id_fk',
    ];

        
    // função atender chamado que é invocada quando o usuário logado 
    // clica em atender chamado. Se o usuário for admin, poderá escolher 
    // qual usuário do banco vai atender o chamado. 
    public function atenderChamado() {

    }

    public function insert() {
        $this->validate();

        $this->chamado_token = $this->tokenG();
        
        $nomeSetor = $this->getSetor($this->chamado_setor);
        $this->setor_id_fk = $this->chamado_setor;
        $this->chamado_setor = $nomeSetor;
        
        if(is_numeric($this->chamado_assunto)) {
            $nomeAssunto = $this->getAssunto($this->chamado_assunto);
            $this->chamado_assunto = $nomeAssunto;
        }

        //fazer o assunto ser dinâmico
        // if($this->chamado_assunto == 1) {
        //     $this->chamado_assunto = "Internet";
        // } elseif($this->chamado_assunto == 2) {
        //     $this->chamado_assunto = "Monitor";
        // } elseif($this->chamado_assunto == 3) {
        //     $this->chamado_assunto = "Outro";  
        // }

        if(!$this->chamado_criado_em) {
            $data = new DateTime('now');
            $dataFormatada = $data->format('Y-m-d H:i:s');
            $this->chamado_criado_em = $dataFormatada;
        }

        if(!$this->chamado_status) {
            $this->chamado_status = "Aberto";
        }

        if(!$this->usuario_id_fk) {
            $this->usuario_id_fk = null;
        } 


        return parent::insert();
    }

    
    //ao invés de chamar uma função diferente, pode ser apenas uma condicional 
    public function editar($id) {
        $this->validateUpdate();

        $nomeSetor = $this->getSetor($this->chamado_setor);
        $this->setor_id_fk = $this->chamado_setor;
        $this->chamado_setor = $nomeSetor;

        return parent::update($id);
    }

    public function setId($id) {
        $this->chamado_id = $id;
    }

    public static function getCountChamadosAtendidos() {
        $result = Database::getResultFromQuery(
            "SELECT count(chamado_id) 
            FROM chamados
            WHERE chamado_status = 'Finalizado' 
            OR chamado_status = 'Em atendimento'"
        );

        return $result->fetch_assoc();
    }

    public static function getCountChamadosAbertos() {
        //pega o dia de ontem formatado
        //passa para essa variável data
        //passa o valor de data certinho como parâmetro da consulta
        //para mostrar os contadores no dia hoje
        // $data = $this->getYesterdayFormated();
        
        $result = Database::getResultFromQuery(
            "SELECT count(chamado_id) 
            FROM chamados
            WHERE chamado_status = 'Aberto'"
            //AND chamado_criado_em > 'yyyy-mm-dd' (isso já é suficiente)
            //exemplo:
            // AND chamado_criado_em > '2023-12-28'"
            //no caso a data vai ser o valor da variável:
            // AND chamado_criado_em > '{$data}'"
        );

        return $result->fetch_assoc();
    }

    public static function getTotalChamados() {

        $result = Database::getResultFromQuery(
            "SELECT count(chamado_id) 
            FROM chamados"
        );

        return $result->fetch_assoc();
    }

    public function getSetor($setorId) {
       $setor = Setores::getOne(['setor_id' => $setorId]);

       if($setor) {
        return $setor->setor_nome;
       } else {
        return "Setor não encontrado";
       }
    }

    public function getAssunto($assuntoId) {
       $assunto = Assuntos::getOne(['assunto_id' => $assuntoId]);

       if($assunto) {
        return $assunto->assunto_nome;
       } else {
        return "Assunto não encontrado";
       }
    }

    public static function getChamadosPorMes($usuarioId, $date) {
        $registros = [];
        $status = "Aberto";
        $dataInicio = getFirstDayOfMonth($date)->format('Y-m-d');
        $dataFim = getLastDayOfMonth($date)->format('Y-m-d');

        $resultado = static::getResultFromSelect([
            // 'usuario_id_fk' => $usuarioId,
            'raw' => "chamado_criado_em between '{$dataInicio}' AND '{$dataFim}' AND usuario_id_fk = '{$usuarioId}'"
        ]);

        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $registros[$row['chamado_criado_em']] = new Chamados($row);
            }
        }

        return $registros;
    }

    private function validate() {
        $errors = [];

        if(!$this->chamado_solicitante) {
            $errors['chamado_solicitante'] = 'Nome é um campo abrigatório.';
        }

        if(!$this->chamado_email_solicitante) {
            $errors['chamado_email_solicitante'] = 'E-mail é um campo obrigatório';
        } elseif(!filter_var($this->chamado_email_solicitante, FILTER_VALIDATE_EMAIL)) {
            $errors['chamado_email_solicitante'] = 'Forneça um formato de e-mail válido.';
        }

        if($this->chamado_setor === 'Selecione o setor') {
            $errors['chamado_setor'] = 'Selecione um setor';
        }

        if($this->chamado_assunto === 'Selecione a categoria do problema') {
            $errors['chamado_assunto'] = 'Selecione um problema';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    private function validateUpdate() {
        $errors = [];

        if(!$this->chamado_solicitante) {
            $errors['chamado_solicitante'] = 'Nome é um campo abrigatório.';
        }

        if(!$this->chamado_email_solicitante) {
            $errors['chamado_email_solicitante'] = 'E-mail é um campo obrigatório';
        } elseif(!filter_var($this->chamado_email_solicitante, FILTER_VALIDATE_EMAIL)) {
            $errors['chamado_email_solicitante'] = 'Forneça um formato de e-mail válido.';
        }

        
        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    public static function tokenG($length=10) {
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $token = "";

        for($i = 0; $i < $length; $i++) {
            $token .= $caracteres[rand(0,35)];
        }

        return $token;
    }

    private function getYesterdayFormated() {

    }
}