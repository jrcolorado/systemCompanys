<h1>Vendas - Adicionar</h1>

<form method="POST">
    <label for="client_name">Nome do Cliente</label></br>
    <input type="text" name="client_name" id="client_name" data-type="search_clients"/>
    <button class="client_add_button">+</button>
    <input type="hidden" name="client_id" id="client_name" /><br/><br/><br/>
       
    <label for="status">Status da Venda</label><br/>
    <select name="status" id="status">
        <option value="0">Aguardando Pgto.</option>
        <option value="1">Pago</option>
        <option value="2">Cancelado</option>
    </select><br/><br/>
    <label for="total_price">Valor da Venda</label><br/>
    <input type="text" name="total_price"/><br/><br/>
    
    <input type="submit" value="Adicionar Venda"/>
    
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_sales_add.js"></script>

