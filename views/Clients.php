<h1>Clientes</h1>
<?php if($edit_permission):?>
<div class="button"> 
    <a href="<?php echo BASE_URL;?>/Clients/add">Adicionar um Cliente</a></div>
<?php endif;?>
<input type="text" id="busca" data-type="search_clients"/>
         <table border="0" width="100%">
            <tr>
                <th width="35%">Nome</th>
                <th width="10%">Telefone</th>
                <th width="15%">Cidade</th>
                <th width="10%">Estrelas</th>
                <th width="30%">Ações</th>
            </tr>
           <?php foreach ($clients_list as $c):?>
            <tr>
            <td><?php echo $c['name'];?></td>
            <td><?php echo $c['phone'];?></td>
            <td><?php echo $c['addres_city'];?></td>
            <td style="text-align: center"><?php echo $c['stars'];?></td>
           
             <td style="text-align: center">
                     <?php if ($edit_permission): ?>
                         <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Clients/edit/<?php echo $c['id']; ?>">Editar</a></div>
                         <div class="button button_small_delet"><a href="<?php echo BASE_URL; ?>/Clients/delete/<?php echo $c['id']; ?>" onclick="return confirm('Deseja exclui o Cliente?')">Excluir</a></div>
                           <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Clients/view/<?php echo $c['id']; ?>">Visualizar</a></div>
                     <?php else:?>
                           <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Clients/view/<?php echo $c['id']; ?>">Visualizar</a></div>
                     <?php endif; ?>
                 </td>
            </tr>
     
           <?php endforeach;?>
          
        </table>
<div class="pagination">
    <?php for($q=1; $q<= $p_count; $q++):?>
    <div class="pag_item <?php echo ($q==$p)?'pag_ativo':'';?>"><a href="<?php echo BASE_URL;?>/Clients?p=<?php echo $q;?>"><?php echo $q;?></a></div>
    <?php endfor;?>
    <div style="clear:both"></div>
</div>