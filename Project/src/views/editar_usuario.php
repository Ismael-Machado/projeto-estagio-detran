<main class="content">
    <?php 
        renderTitle(
            'Editar usuário',
            'Mantenha os dados atualizados',
            'icofont-check'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Editar</h3>
            <p class="mb-0">Confirme após modificar as informações</p>
        </div>
        <form action="atualizar_usuario.php" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="id">Código usuário</label>
                    <input type="text" id="id" name="usuario_id"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $usuario['usuario_id'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="usuario_nome"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $usuario['usuario_nome'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="usuario_email" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $usuario['usuario_email'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>
            <input type="hidden" name="usuario_senha" value="<?= $usuario['usuario_senha'] ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nova_senha">Nova Senha</label>
                    <input type="text" id="nova_senha" name="nova_senha" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="confirma_senha">Confirma senha</label>
                    <input type="text" id="confirma_senha" name="confirma_senha" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>    
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="data">Data de criação</label>
                    <!-- usando um type text temporariamente  -->
                    <!-- <input type="date" id="data" name="usuario_criado_em" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value=""> -->
                    <input type="text" id="data" name="usuario_criado_em" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $usuario['usuario_criado_em'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <?php if($_SESSION['user']->usuario_is_admin == 1): ?>
                <div class="form-group col-md-3">
                    <label for="data">Ativo?</label>
                    <input type="checkbox" id="data" name="usuario_is_ativo" class="<?= $errors[''] ? 'is-invalid' : '' ?>" <?= $usuario['usuario_is_ativo'] == 1 ? 'checked' : ''?>>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="admin">Admin?</label>
                    <input type="checkbox" id="admin" name="usuario_is_admin" class="<?= $errors[''] ? 'is-invalid' : '' ?>" <?= $usuario['usuario_is_admin'] == 1 ? 'checked' : ''?>>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <?php endif ?>    
            </div>  
                       
        </div>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-success btn-lg"><i class="icofont-check mr-1"></i>Confirmar</button>
        </div>
    </form>
    </div>
</main>

<?= print_r($data) ?>

