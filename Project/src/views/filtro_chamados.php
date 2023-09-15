<main class="content">
    <?php
    renderTitle(
        'Filtro chamados',
        'Filtro dos chamados por mês e status',
        'icofont-search-stock'
    );
    ?>
    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Solicitante</th>
                <th>Email</th>
                <th>Assunto</th>
                <th>Descrição</th>
                <th>Setor</th>
                <th>Data de Solicitação</th>
                <th>Status</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($registries as $registry): ?>
                    <tr>
                    <td><?= $registry->chamado_solicitante ?></td>
                    <td><?= $registry->chamado_email_solicitante ?></td>
                    <td><?= $registry->chamado_assunto ?></td>
                    <td><?= $registry->chamado_descricao ?></td>
                    <td><?= $registry->chamado_setor ?></td>
                    <td><?= $registry->chamado_criado_em ?></td>
                    <td><?= $registry->chamado_status ?></td>
                    <td>Adicionar botões</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>