<h1>Vendas</h1>
<div class="button"> 
    <a href="<?php echo BASE_URL;?>/Sales/add">Adicionar uma Venda</a></div>
<table border="0" width="100%">
    <tr>
        <th>Nome do Cliente</th>
        <th>Data</th>
        <th>Status</th>
        <th>Valor</th>
        <th width="250">Ações</th>
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
         <td style="text-align: center" >
        <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Sales/edit/<?php echo $sale_item['id'] ?>">Editar</a></div>
        <?php if(!empty($sale_item['nfe_key'])):?>
        <div class="button button_small_view_nfe"><a target="_blank" href="<?php echo BASE_URL; ?>/Sales/view_nfe/<?php echo $sale_item['nfe_key'] ?>">Visualizar Nf-e</a></div>
        <?php else:?>
            <div class="button button_small_generate"><a target="_blank" href="<?php echo BASE_URL; ?>/Sales/generate_nfe/<?php echo $sale_item['id'] ?>">Emitir Nf-e</a></div>
        <?php endif;?>
         </td>
    </tr>
   
    <?php endforeach;?>
</table>