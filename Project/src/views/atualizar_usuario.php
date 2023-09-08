<main class="content">
    <?php 
        renderTitle(
            'Chamado atualizado',
            'Dados atualizados com sucesso',
            'icofont-thumbs-up'
        );
    ?>

    <div>
        <!-- passar aqui informações do chamado -->
        <?php if($_POST['chamado_status'] == "Em atendimento"): ?>
        <p>Atendimento iniciado</p>
        <?php elseif($_POST['chamado_status'] == "Finalizado"): ?>
        <p>Atendimento finalizado</p>
        <?php endif ?>
    </div>

</main>    

<?= print_r($_POST) ?>