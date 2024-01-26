<main class="content">
    <?php 
        renderTitle(
            'Setor atualizado',
            'Dados atualizados com sucesso',
            'icofont-thumbs-up'
        );
    ?>

    <div class="confirmacao">
        <p>Setor <span><?= $_POST['setor_nome'] ?></span> atualizado</p>
    </div>

</main>    

<!-- <?= print_r($_POST) ?> -->