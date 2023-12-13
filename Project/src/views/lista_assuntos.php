<main class="content">
    <?php 
        renderTitle(
            'Lista Assuntos',
            'Vizualize os assuntos cadastrados',
            'icofont-list'
        );

        include(TEMPLATE_PATH . "/messages.php")
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Assuntos</h3>
            <p class="mb-0"> </p>
        </div>
        <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Nome</th>
                    <th>Ativo?</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach($assuntos as $assunto): ?>
                    <tr>
                        <td><?= $assunto->assunto_nome ?></td>                    
                        <td class=<?= $assunto->assunto_is_ativo == 1 ? "table-primary" : "table-active" ?>><?= $assunto->assunto_is_ativo == 1 ? "Sim" : "Não" ?></td>
                        
                        <td>
                            <a href="editar_assunto.php?update=<?= $assunto->assunto_id ?>" class="btn btn-warning rounded-bottom">
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
            <a href="novo_assunto.php" class="btn btn-success btn-lg">
                <i class="icofont-ui-add mr-1"></i>
                Novo
            </a>
        </div>
    </div>
</main>

