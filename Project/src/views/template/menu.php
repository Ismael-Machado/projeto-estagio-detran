<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="lista_chamados.php">
                    <i class="icofont-search-document mr-2"></i>
                    Lista Chamados
                </a>
            </li>
            <li class="nav-item">
                <a href="chamados.php">
                    <i class="icofont-plus-circle mr-2"></i>
                    Novo Chamado
                </a>
            </li>
            <li class="nav-item">
                <a href="filtro_chamados.php">
                    <i class="icofont-search-stock mr-2"></i>
                    Filtro Chamados
                </a>
            </li>
            <li class="nav-item">
                <a href="relatorio_chamados.php">
                    <i class="icofont-presentation mr-2"></i>
                    Relatório Chamados
                </a>
            </li>
            <li class="nav-item">
                <a href="lista_setores.php">
                    <i class="icofont-company mr-2"></i>
                    Lista Setores
                </a>
            </li>
            <li class="nav-item">
                <a href="lista_usuarios.php">
                    <i class="icofont-users mr-2"></i>
                    Lista Usuários
                </a>
            </li>
        </ul>
    </nav>
    <div class="sidebar-widgets">
        <div class="sidebar-widget">
            <i class="icon icofont-check text-success"></i>
            <div class="info">
                <span id="qtd-atendidos" class="main text-success">
                    <!-- <?= $totalChamadosAtendidos['count(chamado_id)'] ?> -->
                </span>
                <span class="label text-muted">
                    Chamados atendidos
                </span>
            </div>    
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            <i class="icon-alarm icofont-ui-alarm text-danger"></i>
            <div class="info">
                <span id="qtd-abertos" class="main text-danger">
                    <!-- <?= $totalChamadosAbertos['count(chamado_id)'] ?> -->
                </span>
                <span class="label text-muted">
                    Chamados em espera
                </span>
            </div>    
        </div>
    </div>
</aside>