<main class="content">
    <?php 
        renderTitle(
            'Chamado Solicitado',
            'Seu chamado foi aberto, aguarde o atendimento',
            'icofont-thumbs-up'
        );
    ?>

    <div class="confirmacao">
        
        <?php if($_SESSION['user']) : ?>
            <p>Chamado <span><?= $id ?></span> aberto com sucesso</p>
        <?php else : ?>
            <p>Chamado aberto com sucesso</p>
        <?php endif ?>
    </div>

</main>    