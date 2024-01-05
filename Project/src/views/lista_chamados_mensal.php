<main class="content">
    <?php 
        renderTitle(
            'Lista Chamados',
            'Vizualize a lista de chamados do mês',
            'icofont-list'
        );

        include(TEMPLATE_PATH . "/messages.php")
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Chamados</h3>
            <p class="mb-0"> </p>
        </div>
        <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Solicitante</th>
                    <th>Assunto</th>
                    <th>Descrição</th>
                    <th>Atendente</th>
                    <th>Status</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach($chamados as $chamado): ?>
                    <tr>
                        <td><?= $chamado->chamado_solicitante ?></td>
                        <td><?= $chamado->chamado_assunto ?></td>
                        <td><?= $chamado->chamado_descricao ?></td>
                        <!-- necessário resolver essa parte de apresentação do atendente -->
                        <?php foreach($usuarios as $usuario) {
                            if($chamado->usuario_id_fk == $usuario->usuario_id) {
                                $nome_usuario = $usuario->usuario_nome;
                            }
                        }
                        ?>
                        <td><?= $chamado->usuario_id_fk == null ? "Não atribuído" : $nome_usuario ?></td>
                        <!-- transformar condicional da classe em uma única estrutura -->
                        <td class=<?= $chamado->chamado_status == "Em atendimento" ? "table-primary" : "" ?><?= $chamado->chamado_status == "Aberto" ? "table-warning" : ""?><?= $chamado->chamado_status == "Finalizado" ? "table-info" : ""?>><?= $chamado->chamado_status ?></td>
                        <td>
                            <!-- abrir um if em php pra testar o status do chamado
                            se for em atendimento, mostrar o botão "finalizar" -->
                            <?php if($chamado->chamado_status == "Em atendimento"): ?> 
                            <a href="finalizar_chamado.php?update=<?= $chamado->chamado_id ?>" class="btn btn-danger rounded-bottom">
                                <i class="icofont-check"></i>
                                Finalizar
                            </a>
                            <?php elseif($chamado->chamado_status == "Aberto"): ?>    
                            <a href="atender_chamado.php?update=<?= $chamado->chamado_id ?>" class="btn btn-secondary rounded-bottom">
                                <i class="icofont-architecture-alt"></i>
                                Atender
                            </a>
                            <?php endif ?>
                            <!-- abrir condicional aqui pra testar se o user da session é admin
                            se não for admin, não mostrar esse button  -->
                            <?php if($_SESSION['user']->usuario_is_admin == 1) : ?>
                            <a href="editar_chamado.php?update=<?= $chamado->chamado_id ?>" class="btn btn-warning rounded-bottom">
                                <i class="icofont-edit"></i>
                                Editar
                            </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
              </table>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <!-- se todos os dados passarem pela validação, o href desse butão link
            chama o controller de confirmação de inserção e carrega na view a 
            confirmação de abertura do chamado com o número do chamado para 
            posterior pesquisa -->
            <!-- 
            <a href="???" class="btn btn-secondary btn-lg">
                <i class="icofont-arrow-right mr-1"></i>
                próxima página
            </a>
             -->
             <?php echo $pagination->links() ?>
        </div>
    </div>
</main>

<?= print_r($nome_usuario) ?>