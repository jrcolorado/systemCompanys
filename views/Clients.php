<h1>Clientes</h1>
<?php if($edit_permission):?>
<div class="button"> 
    <a href="<?php echo BASE_URL;?>/Clients/add">Adicionar um Cliente</a></div>
<?php endif;?>
         <table border="0" width="100%">
            <tr>
                <th width="32%">Nome</th>
                <th width="15%">Telefone</th>
                <th width="20%">Cidade</th>
                <th width="15%">Estrelas</th>
                <th width="18%">Ações</th>
            </tr>
           <?php foreach ($clients_list as $c):?>
            <tr>
            <td><?php echo $c['name'];?></td>
            <td><?php echo $c['phone'];?></td>
            <td><?php echo $c['addres_city'];?></td>
            <td><?php echo $c['stars'];?></td>
            
             <td>
                <div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Clients/edit/<?php echo $c['id']?>">Editar</a></div>
                <div class="button button_small_delet"><a href="<?php echo BASE_URL; ?>/Clients/delete/<?php echo $c['id']?>" onclick="return confirm('Deseja exclui o Cliente?')">Excluir</a></div>
             </td>
           
            </tr>
           <?php endforeach;?>
          
        </table>