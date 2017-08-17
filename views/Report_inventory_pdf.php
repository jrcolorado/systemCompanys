<style type="text/css">
    th{text-align: left;}
</style>
 
<h1>Relatório de Estoque</h1>
<fieldset>
   Relação de itens com estoque abaixo da quantidade minima.
</fieldset>
<hr>
<table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Qtd Min.</th>
                  <th>Diferença</th>
               
            </tr>
            <?php foreach ($inventory_list as $i): ?>
                <tr>
                    <td><?php echo $i['name']; ?></td>
                    <td style="text-align: center">R$<?php echo number_format($i['price'], 2); ?></td>
                    <td width="90" style="text-align: center"><?php echo $i['quant']; ?></td>
                    <td width="90" style="text-align: center"><?php 
                    if($i['min_quant']>$i['quant']){
                        echo '<span style="color:red">'.($i['min_quant']).'</span>';
                    }else{echo $i['min_quant']; }
                    ?></td>
                     <td width="90" style="text-align: center">
                         <?php             
                        echo '<span style="color:red">'.($i['dif']).'</span>';
                    ?></td>
                    
         </tr>
            <?php endforeach;?>
          
        </table>