<main class="content">
    <?php 
        renderTitle(
            'Editar chamado',
            'Mantenha os dados consistentes',
            'icofont-file-check'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Editar</h3>
            <p class="mb-0">Confirme após modificar as informações</p>
        </div>
        <form action="atualizar_chamado.php" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id">Código chamado</label>
                    <input type="text" id="id" name="chamado_id"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_id'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="setor">Setor</label>
                    <input type="text" id="setor" name="chamado_setor"  class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_setor'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome solicitante</label>
                    <input type="text" id="nome" name="chamado_solicitante" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_solicitante'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <input type="hidden" name="chamado_email_solicitante" value="<?= $_POST['chamado_email_solicitante'] ?>">
                <div class="form-group col-md-6">
                    <label for="email">E-mail solicitante</label>
                    <input type="text" id="email" name="chamado_email_solicitante" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_email_solicitante'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="assunto">Problema</label>
                    <input type="text" id="assunto" name="chamado_assunto" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_assunto'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>    
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="chamado_descricao" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_descricao'] ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="data">Data</label>
                    <input type="text" id="data" name="chamado_criado_em" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_criado_em'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="chamado_status" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_status'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>

            </div> 
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user">Usuários</label>
                    <select id="user" name="usuario_id_fk" class="form-select form-control" aria-label="Default select example">
                        <option selected value="<?= $_POST['usuario_id_fk'] ?>">Selecione o atendente</option> 
                        <?php foreach($usuarios as $user): ?>
                        <option value="<?= $user->usuario_id ?>"><?= $user->usuario_nome ?></option>
                        <!-- <option value="2">Jurídico</option>
                        <option value="3">Atendimento</option>    -->
                        <!-- <option value="1">Administração</option>
                        <option value="2">Jurídico</option>
                        <option value="3">Atendimento</option>    -->
                        <?php endforeach ?>                     
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="setores">Setores</label>
                    <select id="setores" name="chamado_setor" class="form-select form-control" aria-label="Default select example">
                        <option selected value="<?= $_POST['setor_id_fk'] ?>">Selecione o setor</option> 
                        <?php foreach($setores as $setor): ?>
                        <option value="<?= $setor->setor_id ?>"><?= $setor->setor_nome ?></option>
                        <?php endforeach ?>                     
                    </select>
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