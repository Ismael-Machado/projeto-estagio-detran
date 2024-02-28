<main class="content">
    <?php 
        renderTitle(
            'Novo setor',
            'Realize o cadastro de novo setor',
            'icofont-plus-circle'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Formulário</h3>
            <p class="mb-0">Preencha os dados corretamente</p>
        </div>
        <form action="salvar_setor.php" method="post">
        <div class="card-body">
        <?php include(TEMPLATE_PATH . '/messages.php') ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="setor_nome" placeholder="Informe o nome" class="form-control <?= $errors['setor_nome'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['setor_nome'] ?>
                    </div>
                </div>
            </div>    
            <input type="hidden" name="setor_is_ativo" value="1">   
               
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-success btn-lg">Salvar</button>
        </div>
    </form>
    </div>
</main>