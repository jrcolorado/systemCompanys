<h1>Relatório de Vendas</h1>

<form method="GET" onsubmit="return openPopup(this)">
    <div class="report-grid-4">
        Nome do cliente<br/>
        <input type="text" name="client_name"/>
        
    </div>
        
    <div class="report-grid-4">
        Período:<br/>
        <input type="date" name="periodo1"/><br/>
        até<br/>
        <input type="date" name="periodo2"/>
    </div>
    <div class="report-grid-4">
        Status das Vendas
        <select name="status">
            <option name="">Todos os Status</option>
            <?php foreach ($status_desc as $statusKey => $statusValue):?>
            <option name="<?php echo $statusKey?>"><?php echo $statusValue?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="report-grid-4">
        Ordenação:
        <select name="order">
            <option name="date_desc">Mais recentes</option>
            <option name="date_asc">Mais antigas</option>
            <option name="status">Status de Venda</option>
        </select>
    </div>
    
    <div style="clear:both"></div>
    <div style="text-align: center">
        <input type="submit" value="Gerar Relatório"/>
    </div>
        
        
</form>




  <!-- Bootstrap core JavaScript
<form>
    <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
</form>

  <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/report_sales.js"></script>          
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.js"></script>
 <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>  

    