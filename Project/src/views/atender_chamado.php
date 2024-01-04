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
            <h3>Atender</h3>
            <p class="mb-0">Confirme após selecionar o atendente</p>
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
                    <input type="text" id="descricao" name="chamado_descricao" 
                    placeholder="Forneça mais detalhes do problema, se desejar" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_POST['chamado_descricao'] ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div> 

            <input type="hidden" name="chamado_criado_em" value="<?= $_POST['chamado_criado_em'] ?>">
            <input type="hidden" name="chamado_status" value="Em atendimento">
            <input type="hidden" name="chamado_token" value="<?= $_POST['chamado_token'] ?>">
           
            <?php if($_SESSION['user']->usuario_is_admin) : ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user">Usuários</label>
                    <select id="user" name="usuario_id_fk" class="form-select form-control" aria-label="Default select example">
                        <?php foreach($usuarios as $user): ?>
                        <?php if($user->usuario_is_ativo == 1) : ?>
                        <option <?= $_SESSION['user']->usuario_id === $user->usuario_id ? 'selected' : '' ?> value="<?= $user->usuario_id ?>"><?= $user->usuario_nome ?></option>
                        <?php endif ?>
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
            </div>  
            <?php else : ?>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user">Atendente</label>
                    <input type="hidden" name="usuario_id_fk" value="<?= $_SESSION['user']->usuario_id ?>">
                    <input type="text" id="user" name="nome_atendente" 
                    class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->usuario_nome ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div> 
            <?php endif ?>
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
            <button class="btn btn-success btn-lg"><i class="icofont-check mr-1"></i>Confirmar</button>
        </div>
    </form>
    </div>
</main>


<?= var_dump($usuarios) ?>
<?= var_dump($_POST) ?>
