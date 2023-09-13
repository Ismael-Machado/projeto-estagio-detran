<main class="content">
    <?php 
        renderTitle(
            'Relatório chamados',
            'Resumo da quantidade de chamados atendidos',
            'icofont-chart-histogram'
        );
    ?>

    <div class="summary-boxes">
        <div class="summary-box bg-primary">
            <i class="icon icofont-listing-number"></i>
            <p class="title">Total de Chamados</p>
            <h3 class="value"><?= $totalChamados['count(chamado_id)'] ?></h3>
        </div>
        <div class="summary-box bg-danger">
            <i class="icon icofont-not-allowed"></i>
            <p class="title">Não atendidos</p>
            <h3 class="value"><?= $totalChamadosAbertos['count(chamado_id)'] ?></h3>
        </div>
        <div class="summary-box bg-success">
            <i class="icon icofont-check-circled"></i>
            <p class="title">Atendidos ou finalizados</p>
            <h3 class="value"><?= $totalChamadosAtendidos['count(chamado_id)'] ?></h3>
        </div>
    </div>
</main>