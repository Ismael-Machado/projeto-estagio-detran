<main class="content">
    <?php 
        renderTitle(
            'Editar setor',
            'Mantenha os dados atualizados',
            'icofont-check'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Editar</h3>
            <p class="mb-0">Confirme após modificar as informações</p>
        </div>
        <form action="atualizar_setor.php" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="id">Código setor</label>
                    <input type="text" id="id" name="setor_id"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $setor['setor_id'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="setor_nome"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $setor['setor_nome'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="ativo">Ativo?</label>
                    <input type="checkbox" id="ativo" name="setor_is_ativo" class="<?= $errors[''] ? 'is-invalid' : '' ?>" <?= $setor['setor_is_ativo'] == 1 ? 'checked' : ''?>>
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


