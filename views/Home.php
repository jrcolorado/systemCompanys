<div class="db_row1">
    <div class="grid-1">
        <div class="db-grid-area">
            <div class="db-grid-area-count"><?php echo $products_sold;?></div>
            <div class="db-grid-area-legend">Produtos Vendidos</div>
        </div>
    </div>
    <div class="grid-1">
        <div class="db-grid-area">
            <div class="db-grid-area-count">R$ <?php echo number_format($revenue,2);?></div>
            <div class="db-grid-area-legend">Receitas</div>
        </div>
    </div>
    <div class="grid-1">
        <div class="db-grid-area">
            <div class="db-grid-area-count">R$ <?php echo number_format($expenses,2);?></div>
            <div class="db-grid-area-legend">Despesas</div>
        </div>
    </div>
</div>
<div class="db_row2">
    <div class="grid-2">
        <div class="db-info">
            <div class="db-info-title">Receita e Despesas dos ultimos 30 dias</div>
            <div class="db-info-body" style="height:350px">
                <canvas id="rel1"></canvas>
            </div>
        </div>
    </div>
    <div class="grid-1">
         <div class="db-info">
            <div class="db-info-title">Status de Pagto.</div>
            <div class="db-info-body" style="height:350px"> <canvas id="rel2"></canvas></div>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var days_list = <?php echo json_encode($days_list);?>;
    //array_values retorno um array somente de valores validos
    var revenue_list = <?php echo json_encode(array_values($revenue_list));?>;
    var expenses_list = <?php echo json_encode(array_values($expenses_list));?>;
    var status_list = <?php echo json_encode(array_values($status_list));?>;
    var status_name_list = <?php echo json_encode(array_values($status_desc));?>;
</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_home.js"></script>
