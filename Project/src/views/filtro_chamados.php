<main class="content">
    <?php
    renderTitle(
        'Filtro chamados',
        'Filtro dos chamados por mês e status',
        'icofont-search-stock'
    );
    print_r($registries);

    echo "<br><br>";
    $dates = array_keys($registries);
    foreach ($dates as $date) {
        echo "Data: $date<br>";
    }
    ?>
</main>