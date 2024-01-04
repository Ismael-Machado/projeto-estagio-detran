<main class="content">
    <?php
    renderTitle(
        'Busca chamados',
        'Pesquisa chamados por código',
        'icofont-search-stock'
    );
    ?>
    
        <form class="mb-4" action="#" method="post">
        <div class="input-group">
            <input type="text" name="chamado_token" class="form-control" placeholder="Informe o código a ser buscado"> 
            <button class="btn btn-primary ml-2">
                <i class="icofont-search"></i>
            </button>
        </div>
        </form>
        <?php if(count($chamadoData) > 0) : ?> 
        <div class="card">
        <div class="card-header">
            <h3>Resultados da busca</h3>
            <p class="mb-0"> </p>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Solicitante</th>
                <th>Email</th>
                <th>Assunto</th>
                <th>Descrição</th>
                <th>Setor</th>
                <th>Data de Solicitação</th>
                <th>Status</th>
                <th>Código do chamado</th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $chamadoData['chamado_solicitante'] ?></td>
                    <td><?= $chamadoData['chamado_email_solicitante'] ?></td>
                    <td><?= $chamadoData['chamado_assunto'] ?></td>
                    <td><?= $chamadoData['chamado_descricao'] ?></td>
                    <td><?= $chamadoData['chamado_setor'] ?></td>
                    <td><?= date('d/m/Y', strtotime($chamadoData['chamado_criado_em'])) ?></td>
                    <td class=<?= $chamadoData['chamado_status'] == "Em atendimento" ? "table-primary" : "" ?><?= $chamadoData['chamado_status'] == "Aberto" ? "table-warning" : ""?><?= $chamadoData['chamado_status'] == "Finalizado" ? "table-info" : ""?>><?= $chamadoData['chamado_status'] ?></td>
                    <td><mark><?= $chamadoData['chamado_token'] ?></mark></td>
                </tr>
            </tbody>
        </table>
        </div>
    <div class="card-footer d-flex justify-content-between">
       <p class="h6"><em>Guarde o código do chamado para posterior consulta, se for o caso.</em></p>        
    </div>
    </div>
    <?php elseif(count($_POST) > 0) : ?> 
        <div class="my-3 alert alert-warning" role="alert">
            Nenhum registro encontrado! 
        </div>
    <?php endif ?>
    <div class="d-flex justify-content-end">
       <a href=<?= $_SESSION['user'] ? "chamados.php" : "abrir_chamado.php" ?> class="btn btn-secondary rounded-bottom ml-5">
            <i class="icofont-arrow-left"></i>
                Voltar
            </a>    
    </div>
</main>