<main class="content">
    <?php 
        renderTitle(
            'Editar assunto',
            'Mantenha os dados atualizados',
            'icofont-check'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Editar</h3>
            <p class="mb-0">Confirme após modificar as informações</p>
        </div>
        <form action="atualizar_assunto.php" method="post">
        <div class="card-body">
        <?php include(TEMPLATE_PATH . '/messages.php') ?>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="id">Código assunto</label>
                    <input type="text" id="id" name="assunto_id"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['assunto_id'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="assunto_nome"  class="form-control <?= $errors['assunto_nome'] ? 'is-invalid' : '' ?>" value="<?= $_POST['assunto_nome'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors['assunto_nome'] ?>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="ativo">Ativo?</label>
                    <input type="checkbox" id="ativo" name="assunto_is_ativo" class="<?= $errors[''] ? 'is-invalid' : '' ?>" <?= $_POST['assunto_is_ativo'] == 1 ? 'checked' : ''?>>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>           
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-success btn-lg"><i class="icofont-check mr-1"></i>Confirmar</button>
        </div>
    </form>
    </div>
</main>


