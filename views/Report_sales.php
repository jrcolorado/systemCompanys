<h1>Relatório de Vendas</h1>

<form method="GET" onsubmit="return openPopup(this)">
    <div class="report-grid-4">
        Nome do cliente<br/>
        <input type="text" name="client_name" id="client_name" data-type="search_clients"/><br/><br/>
       
        Período:<br/>
        <input type="text" name="period1"/><br/>
        até<br/>
        <input type="text" name="period2"/><br/><br/>
        
        Status das Vendas
        <select name="status">
            <option value="">Todos os Status</option>
            <?php foreach ($status_desc as $statusKey => $statusValue): ?>
                <option value="<?php echo $statusKey ?>"><?php echo $statusValue ?></option>
            <?php endforeach; ?>
        </select><br/><br/>
        
        Ordenação:
        <select name="order">
            <option value="date_desc">Mais recentes</option>
            <option value="date_asc">Mais antigas</option>
            <option value="status">Status de Venda</option>
        </select><br/><br/>
       
        <input type="submit" value="Gerar Relatório"/><br/><br/><br/>
        
 </form>


<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_report_sales.js"></script>

