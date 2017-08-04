<h1>Permissões</h1>
<div class="tabarea">
    <div class="tabitem activetab">Grupos de permissões</div>
    <div class="tabitem">Permissões</div>
</div>
<div class="tabcontent">
    <div class="tabbody" style="display: block">
        
    <div class="button"> <a href="<?php echo BASE_URL;?>/Permissions/add_group">Adicionar um Group</a></div>
         <table border="0" width="100%">
            <tr>
                <th>Nome do Group de permissões</th>
                <th>Ações</th>
            </tr>
          <?php foreach ($permissions_group_list as $p):?>
            <tr>
                <td><?php echo $p['name'];?></td>
                <td width="200"><div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Permissions/set_group/<?php echo $p['id']?>">Editar</a></div>
                <div class="button button_small_delet"><a href="<?php echo BASE_URL; ?>/Permissions/delete_group/<?php echo $p['id']?>" onclick="return confirm('Deseja exclui o Group?')">Excluir</a></div></td>
            </tr>
            <?php endforeach;?>
        </table>
       
    
    </div>
    <div class="tabbody">
        <div class="button"> <a href="<?php echo BASE_URL;?>/Permissions/add">Adicionar Permissão</a></div>
        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($permissions_list as $p):?>
            <tr>
                <td><?php echo $p['name'];?></td>
                <td width="50"><div class="button button_small"><a href="<?php echo BASE_URL; ?>/Permissions/delete/<?php echo $p['id']?>" onclick="return confirm('Deseja exclui a permissão?')">Excluir</a></div></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>