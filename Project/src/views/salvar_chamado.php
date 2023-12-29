<main class="content">
    <?php 
        renderTitle(
            'Chamado Solicitado',
            'Seu chamado foi aberto, aguarde o atendimento',
            'icofont-thumbs-up'
        );
    ?>

    <!-- <div class="confirmacao">
        
        <?php if($_SESSION['user']) : ?>
            <p>Chamado <span><?= $hash ?></span> aberto com sucesso</p>
        <?php else : ?>
            <p>Chamado de código <span><?= $hash ?></span> aberto com sucesso</p>           
        <?php endif ?>
    </div> -->
    <div class="card">
        <div class="card-header">
            <h3>Informações da solicitação</h3>
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
       <a href=<?= $_SESSION['user'] ? "chamados.php" : "abrir_chamado.php" ?> class="btn btn-secondary rounded-bottom ml-5">
            <i class="icofont-arrow-left"></i>
                Voltar
        </a>    
</div>
</main>    