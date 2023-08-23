<main class="content">
    <?php 
        renderTitle(
            'Chamado Solicitado',
            'Seu chamado foi aberto, aguarde o atendimento',
            'icofont-support-faq'
        );
    ?>

    <div>
        <?= var_dump($_POST); echo '<br>' ?>
        <?= var_dump($chamado->chamado_assunto) ?>
    </div>

</main>    