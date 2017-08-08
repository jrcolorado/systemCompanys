<h1>Estoque</h1>
<?php if($add_permission):?>
<div class="button"> 
    <a href="<?php echo BASE_URL;?>/Inventory/add">Adicionar um Produto</a></div>
<?php endif;?>
<input type="text" id="busca" data-type="search_inventory"/> 


<table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Qtd estoque</th>
                <th>Qtd Min.</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($inventory_list as $i): ?>
                <tr>
                    <td><?php echo $i['name']; ?></td>
                    <td>R$<?php echo " ".number_format($i['price'], 2); ?></td>
                    <td><?php echo $i['quant']; ?></td>
                    <td><?php echo $i['min_quant']; ?></td>
                    <td>
                        <?php if ($edit_permission): ?>
                            <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Inventory/edit/<?php echo $i['id'] ?>">Editar</a></div>
                            <div class="button button_small_delet"><a href="<?php echo BASE_URL; ?>/Inventory/delete/<?php echo $i['id'] ?>" onclick="return confirm('Deseja exclui o Usuário?')">Excluir</a></div>
                            <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Inventory/view/<?php echo $i['id']; ?>">Visualizar</a></div></td>
                <?php else: ?>
                    <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Inventory/view/<?php echo $i['id']; ?>">Visualizar</a></div>
                <?php endif; ?>
             </td>
         </tr>
            <?php endforeach;?>
          
        </table>