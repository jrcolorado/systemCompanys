<style type="text/css">
    th{text-align: left;}
</style>
 
<h1>Relatório de Vendas</h1>
<fieldset>
    <?php
    if (isset($filters['client_name']) && !empty($filters['client_name'])) {
        echo "Filtrado pelo Nome: " . $filters['client_name'] . "<br/>";
    }
    if (!empty($filters['period1']) && !empty($filters['period2'])) {
       // echo "Filtrado no período: " . date('d/m/Y', strtotime($filters['period1'])) . " a " . date('d/m/Y', strtotime($filters['period2'])) . "<br/>";
    } echo "Filtrado no período: " .$filters['period1'] . " a " .$filters['period2'] . "<br/>";
    if ($filters['status'] != "") {
        echo "Filtrado com status: " . $status_desc[$filters['status']];
    }
    ?>
</fieldset>
<hr>

<table border="0" width="100%">
    <tr>
        <th>Nome do Cliente</th>
        <th>Data</th>
        <th>Status</th>
        <th>Valor</th>
      
    </tr>
    <?php foreach ($sales_list as $sale_item):?>
    <tr>
        <td><?php echo $sale_item['name'];?></td>
        <td width="35"><?php echo date('d/m/Y', strtotime($sale_item['date_sale']));?></td>
        <td><?php 
          if($status_desc[$sale_item['status']]== 'Cancelada'){
                        echo '<span style="color:red">'.($status_desc[$sale_item['status']]).'</span>';
                    }else{echo $status_desc[$sale_item['status']]; }
        ?></td>
        <td>R$<?php echo number_format($sale_item['total_price'],2,',','.');?></td>
         
    </tr>
   
    <?php endforeach;?>
</table>
