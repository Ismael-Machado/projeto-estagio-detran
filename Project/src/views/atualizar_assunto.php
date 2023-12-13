<main class="content">
    <?php 
        renderTitle(
            'Assunto atualizado',
            'Dados atualizados com sucesso',
            'icofont-thumbs-up'
        );
    ?>

    <div class="confirmacao">
        <p>Assunto <span><?= $_POST['assunto_nome'] ?></span> atualizado</p>
    </div>

</main>
