<main class="content">
    <?php 
        renderTitle(
            'Lista Usuários',
            'Vizualize os usuários cadastrados',
            'icofont-list'
        );

        include(TEMPLATE_PATH . "/messages.php")
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Usuários</h3>
            <p class="mb-0"> </p>
        </div>
        <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Data cadastro</th>
                    <th>Ativo?</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario->usuario_nome ?></td>
                        <td><?= $usuario->usuario_email ?></td>
                        <td><?= date('d/m/Y', strtotime($usuario->usuario_criado_em)) ?></td>
                        <td class=<?= $usuario->usuario_is_ativo == 1 ? "table-primary" : "table-active" ?>><?= $usuario->usuario_is_ativo == 1 ? "Sim" : "Não" ?></td>
                        
                        <td>
                            <a href="editar_usuario.php?update=<?= $usuario->usuario_id ?>" class="btn btn-warning rounded-bottom">
                                <i class="icofont-edit"></i>
                                Editar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
              </table>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="novo_usuario.php" class="btn btn-success btn-lg">
                <i class="icofont-ui-add mr-1"></i>
                Novo
            </a>
        </div>
    </div>
</main>

