<main class="content">
    <?php 
        renderTitle(
            'Atender chamado',
            'Realize o atendimento',
            'icofont-support-faq'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Finalizar</h3>
            <p class="mb-0">Confirme a finalização do chamado</p>
        </div>
        <form action="atualizar_chamado.php" method="post">
        <div class="card-body">
            <div class="form-row">
                <input type="hidden" name="chamado_id" value="<?= $_POST['chamado_id'] ?>">
                <input type="hidden" name="chamado_setor" value="<?= $_POST['chamado_setor'] ?>">
                
                

                <div class="form-group col-md-6">
                    <label for="nome">Nome solicitante</label>
                    <input type="text" id="nome" name="chamado_solicitante" placeholder="Informe seu nome" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_solicitante'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <input type="hidden" name="chamado_email_solicitante" value="<?= $_POST['chamado_email_solicitante'] ?>">
                <div class="form-group col-md-6">
                    <label for="email">Problema</label>
                    <input type="text" id="email" name="chamado_assunto" placeholder="Informe seu e-mail" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_assunto'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>    
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="chamado_descricao" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_descricao'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="data">Data da solicitação</label>
                    <input type="text" id="data" name="chamado_criado_em" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_criado_em'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>
            <input type="hidden" name="chamado_status" value="Finalizado">
            <input type="hidden" name="chamado_token" value="<?= $_POST['chamado_token'] ?>">

            <input type="hidden" name="usuario_id_fk" value="<?= $_POST['usuario_id_fk'] ?>">
            <input type="hidden" name="setor_id_fk" value="<?= $_POST['setor_id_fk'] ?>">
            
            
        </div>
        <div class="card-footer d-flex justify-content-center">
            <!-- se todos os dados passarem pela validação, o href desse butão link
            chama o controller de confirmação de inserção e carrega na view a 
            confirmação de abertura do chamado com o número do chamado para 
            posterior pesquisa -->
            <!-- <a href="salvar_chamado.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Confirma
            </a> -->
            <button class="btn btn-warning btn-lg"><i class="icofont-check mr-1"></i>Finalizar</button>
        </div>
    </form>
    </div>
</main>


<?= var_dump($usuarios) ?>
<?= var_dump($_POST) ?>
