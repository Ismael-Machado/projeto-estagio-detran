<main class="content">
    <?php 
        renderTitle(
            'Abrir chamado',
            'Realize a solicitação de novo chamado',
            'icofont-support-faq'
        );
    ?> 
    <div class="card">
        <div class="card-header">
            <h3>Formulário</h3>
            <p class="mb-0">Preencha os dados corretamente</p>
        </div>
        <form action="salvar_chamado.php" method="post">
        <div class="card-body">
            <?php include(TEMPLATE_PATH . '/messages.php') ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="chamado_solicitante" placeholder="Informe seu nome" class="form-control <?= $errors['chamado_solicitante'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['chamado_solicitante'] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="chamado_email_solicitante" placeholder="Informe seu e-mail" class="form-control <?= $errors['chamado_email_solicitante'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors['chamado_email_solicitante'] ?>
                    </div>
                </div>
            </div>    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="setor">Setor</label>
                    <select id="setor" name="chamado_setor" class="form-select form-control <?= $errors['chamado_setor'] ? 'is-invalid' : '' ?>" aria-label="Default select example">
                        <option selected>Selecione o setor</option> 
                        <?php foreach($setores as $setor): ?>
                        <option value="<?= $setor->setor_id ?>"><?= $setor->setor_nome ?></option>
                        <!-- <option value="2">Jurídico</option>
                        <option value="3">Atendimento</option>    -->
                        <!-- <option value="1">Administração</option>
                        <option value="2">Jurídico</option>
                        <option value="3">Atendimento</option>    -->
                        <?php endforeach ?>                     
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors['chamado_setor'] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="problema">Problema</label>
                    <select id="problema" name="chamado_assunto" class="form-select form-control <?= $errors['chamado_assunto'] ? 'is-invalid' : '' ?>" aria-label="Default select example">
                        <option selected>Selecione a categoria do problema</option>
                        <?php foreach($assuntos as $assunto): ?>
                        <option value="<?= $assunto->assunto_id ?>"><?= $assunto->assunto_nome ?></option>
                        <?php endforeach ?> 
                        <!-- <option value="1">Internet</option>
                        <option value="2">Monitor</option>
                        <option value="3">Outro</option> -->
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors['chamado_assunto'] ?>
                    </div>
                </div>
            </div>    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="chamado_descricao" 
                    placeholder="Forneça mais detalhes do problema, se desejar" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>    
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
            <button class="btn btn-success btn-lg">Salvar</button>
        </div>
    </form>
    </div>
</main>

