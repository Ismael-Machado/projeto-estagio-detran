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
        'usuario_id_fk',
        'setor_id_fk',
    ];

        
    // função atender chamado que é invocada quando o usuário logado 
    // clica em atender chamado. Se o usuário for admin, poderá escolher 
    // qual usuário do banco vai atender o chamado. 
    public function atenderChamado() {

    }

    public function insert() {
        $nomeSetor = $this->getSetor($this->chamado_setor);
        $this->setor_id_fk = $this->chamado_setor;
        $this->chamado_setor = $nomeSetor;
        
        $nomeAssunto = $this->getAssunto($this->chamado_assunto);
        $this->chamado_setor = $nomeAssunto;

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
        $result = Database::getResultFromQuery(
            "SELECT count(chamado_id) 
            FROM chamados
            WHERE chamado_status = 'Aberto'"
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
}