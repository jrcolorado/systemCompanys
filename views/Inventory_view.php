<h1>Dados do Produto</h1>

<form method="POST">
    <label for="name">Descrição do Produto</label></br>
    <input type="text" name="name" readonly="readonly" value="<?php echo $inventory_info['name']?>"/></br></br>
    <label for="price">Preço</label></br>
    <input type="text" name="price" readonly="readonly" value="<?php echo $inventory_info['price']?>" /></br></br>
    <label for="quant">QTd Estoque</label></br>
    <input type="text" name="quant" readonly="readonly" value="<?php echo $inventory_info['quant']?>" /></br></br>
    <label for="min_quant">QTd Minima</label></br>
    <input type="text" name="min_quant" readonly="readonly" value="<?php echo $inventory_info['min_quant']?>" /></br></br>
   
   
</form>
