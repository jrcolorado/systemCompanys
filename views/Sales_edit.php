<h1>Editar - Venda</h1>
<table border="0" width="100%">
    <tr>
        <th width='45%'>Nome do cleinte </th>
        <th width='35%' style='text-align: center'>Data de Emissão </th>
        <th width='20%'>Valor total da venda </th>
    </tr>
    <tr>
        <td><?php echo $sales_info['info']['client_name']; ?></td>
        <td style="text-align: center"><?php echo date('d/m/Y', strtotime($sales_info['info']['date_sale'])); ?></td>
        <td style='text-align: right'>R$ <?php echo number_format($sales_info['info']['total_price'], 2, ',', '.'); ?></td>
    </tr>

</table><br/><br/>

<strong>Status da Venda</strong><br/>
<?php if ($permission_edit): ?>
    <form method="POST">
        <select name='status'>
            <?php foreach ($status_desc as $statusKey => $statusValue): ?>
                <option value="<?php echo $statusKey; ?>"<?php echo ($statusKey == $sales_info['info']['status']) ? 'selected="selected"' : ''; ?> ><?php echo $statusValue ?></option>
            <?php endforeach; ?>

        </select><br/><br/>
        <input type='submit' value='Salvar'/>
    </form>
<?php else: ?>
    <?php echo $status_desc[$sales_info['info']['status']]; ?>
<?php endif; ?>

<table border="0" width="100%">
    <tr>
        <th >Descrição do item </th>
        <th >Quantidade </th>
        <th width='20%'>Preço Unitário </th>
        <th>Sub-Total</th>
    </tr>
    <?php foreach ($sales_info['products'] as $productitem): ?>
        <tr>
            <td><?php echo $productitem['name']; ?></td>
            <td style="text-align: center"><?php echo $productitem['quant']; ?></td>
            <td>R$ <?php echo number_format($productitem['sale_price'], 2, ',', '.'); ?></td>
            <td>R$ <?php echo number_format(($productitem['quant'] * $productitem['sale_price']), 2, ',', '.'); ?></td>       
        </tr>
    <?php endforeach; ?>
</table>

