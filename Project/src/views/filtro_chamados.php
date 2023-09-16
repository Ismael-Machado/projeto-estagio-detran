<main class="content">
    <?php
    renderTitle(
        'Filtro chamados',
        'Filtro dos chamados por mês',
        'icofont-search-stock'
    );
    ?>
    <div>
        <form class="mb-4" action="#" method="post">
        <div class="input-group">
            
            <select name="usuario" class="form-control mr-2" placeholder="Selecione o usuário...">
                <option value="">Selecione o usuário</option>
                <?php
                    foreach ($usuarios as $usuario) {
                        $selecionado = $usuario->usuario_id === $usuarioIdSelecionado ? 'selected' : '';
                        echo "<option value='{$usuario->usuario_id}' {$selecionado}>{$usuario->usuario_nome}</option>";
                    }
                ?>
            </select>

            <select name="periodo" class="form-control" placeholder="Selecione o período...">
                <?php
                    foreach ($periodos as $chave => $mes) {
                        $selecionado = $chave === $periodoSelecionado ? 'selected' : '';
                        echo "<option value='{$chave}' {$selecionado}>{$mes}</option>";
                    }
                ?>
            </select>
            <button class="btn btn-primary ml-2">
                <i class="icofont-search"></i>
            </button>
        </div>
        </form>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Solicitante</th>
                <th>Email</th>
                <th>Assunto</th>
                <th>Descrição</th>
                <th>Setor</th>
                <th>Data de Solicitação</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                    <td><?= $registro->chamado_solicitante ?></td>
                    <td><?= $registro->chamado_email_solicitante ?></td>
                    <td><?= $registro->chamado_assunto ?></td>
                    <td><?= $registro->chamado_descricao ?></td>
                    <td><?= $registro->chamado_setor ?></td>
                    <td><?= $registro->chamado_criado_em ?></td>
                    <td><?= $registro->chamado_status ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>