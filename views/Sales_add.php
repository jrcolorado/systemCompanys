<h1>Vendas - Adicionar</h1>

<form method="POST">
    <label for="client_name">Nome do Cliente</label></br>
    <input type="text" name="client_name" id="client_name" data-type="search_clients"/>
    <button class="client_add_button">+</button>
    <input type="hidden" name="client_id" id="client_id" /><br/><br/><br/>
       
    <label for="status">Status da Venda</label><br/>
    <select name="status" id="status">
        <option value="0">Aguardando Pgto.</option>
        <option value="1">Pago</option>
        <option value="2">Cancelado</option>
    </select><br/><br/>
  
    
    <fieldset>
        <legend>Adicionar Produtos</legend>
        <input type="text" id="add_prod" data-type="search_products"/>
    </fieldset>
    
    <table border="0" width="100%" id="product_table">
        <tr>
            <th>Descrição do Produto</th>
            <th style="text-align: center">Estoque</th>
            <th style="text-align: center">Qdt</th>
            <th>Preço Unit.</th>
            <th>Sub-Total</th>
             <th style="text-align: center">Ação</th>
        </tr>
    </table>
    <hr/>
    <label for="total_price">Valor da Venda</label><br/>
    <input type="text" readonly="readonly"  name="total_price" id="total_price"/><br/><br/>
        
    </br></br>
    <input type="submit" value="Adicionar Venda"/>
    
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_sales_add.js"></script>

