<h1>Editar dados do Produto</h1>

<form method="POST">
    <label for="name">Descrição do Produto</label></br>
    <input type="text" name="name" value="<?php echo $inventory_info['name']?>"/></br></br>
    <label for="price">Preço</label></br>
    <input type="text" name="price" value="<?php echo $inventory_info['price']?>" /></br></br>
    <label for="quant">QTd Estoque</label></br>
    <input type="text" name="quant" value="<?php echo $inventory_info['quant']?>" /></br></br>
    <label for="min_quant">QTd Minima</label></br>
    <input type="text" name="min_quant" value="<?php echo $inventory_info['min_quant']?>" /></br></br>
   
    <input type="submit" value="Salvar"/></br>
</form>
