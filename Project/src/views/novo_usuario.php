<main class="content">
    <?php 
        renderTitle(
            'Novo usuário',
            'Realize o cadastro de novo usuário',
            'icofont-add-users'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Formulário</h3>
            <p class="mb-0">Preencha os dados corretamente</p>
        </div>
        <form action="salvar_usuario.php" method="post">
        <div class="card-body">
        <?php include(TEMPLATE_PATH . '/messages.php') ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="usuario_nome" placeholder="Informe o nome" class="form-control <?= $errors['usuario_nome'] ? 'is-invalid' : '' ?>" value="<?= $_POST['usuario_nome'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors['usuario_nome'] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="usuario_email" placeholder="Informe o e-mail" class="form-control <?= $errors['usuario_email'] ? 'is-invalid' : '' ?>" value="<?= $_POST['usuario_email'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors['usuario_email'] ?>
                    </div>
                </div>
            </div>    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="senha">Senha</label>
                    <input type="text" id="senha" name="usuario_senha" placeholder="Informe a senha" class="form-control <?= $errors['usuario_senha'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['usuario_senha'] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="confirma_senha">Confirme a senha</label>
                    <input type="text" id="confirma_senha" name="confirma_senha" placeholder="Confirme a senha" class="form-control <?= $errors['confirma_senha'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['confirma_senha'] ?>
                    </div>
                </div>
            </div>  
            <input type="hidden" name="usuario_is_ativo" value="1">   
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="checkbox" id="administrador" name="usuario_is_admin" 
                    class="<?= $errors[''] ? 'is-invalid' : '' ?> mr-2">
                    <label for="administrador">Usuário administrador?</label>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>
               
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-success btn-lg">Salvar</button>
        </div>
    </form>
    </div>
</main>