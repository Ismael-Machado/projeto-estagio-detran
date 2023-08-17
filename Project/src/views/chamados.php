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
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="chamado_solicitante" placeholder="Informe seu nome" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="chamado_email_solicitante" placeholder="Informe seu e-mail" class="form-control <?= $errors[''] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="setor">Setor</label>
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected>Selecione o setor</option>
                        <option value="1">Administração</option>
                        <option value="2">Jurídico</option>
                        <option value="3">Atendimento</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Problema</label>
                    <select class="form-select form-control" aria-label="Default select example">
                        <option selected>Selecione a categoria do problema</option>
                        <option value="1">Internet</option>
                        <option value="2">Monitor</option>
                        <option value="3">Outro</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors[''] ?>
                    </div>
                </div>
            </div>    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="chamado_email_solicitante" 
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
            <a href="salvar_chamado.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Confirma
            </a>
        </div>
    </div>
</main>