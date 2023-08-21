<main class="content">
    <?php 
        renderTitle(
            'Lista Chamados',
            'Vizualize a lista de chamados do dia',
            'icofont-smart-search'
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
                    <th>Status</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach($chamados as $chamado): ?>
                    <tr>
                        <td><?= $chamado->chamado_solicitante ?></td>
                        <td><?= $chamado->chamado_assunto ?></td>
                        <td><?= $chamado->chamado_descricao ?></td>
                        <td><?= $chamado->chamado_status ?></td>
                        <td></td>
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
            <a href="???" class="btn btn-secondary btn-lg">
                <i class="icofont-arrow-right mr-1"></i>
                próxima página
            </a>
        </div>
    </div>
</main>