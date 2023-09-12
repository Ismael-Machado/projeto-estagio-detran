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
            <i class="icofont-listing-number"></i>
            <p class="title">Total de Chamados</p>
            <h3 class="value">25</h3>
        </div>
        <div class="summary-box bg-danger">
            <i class="icofont-not-allowed"></i>
            <p class="title">Não atendidos</p>
            <h3 class="value">2</h3>
        </div>
        <div class="summary-box bg-success">
            <i class="icofont-check-circled"></i>
            <p class="title">Atendidos ou finalizados</p>
            <h3 class="value">23</h3>
        </div>
    </div>
</main>