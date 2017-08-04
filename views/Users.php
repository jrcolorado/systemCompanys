<h1>Usuários</h1>
<div class="button"> <a href="<?php echo BASE_URL;?>/Users/add">Adicionar um Usuário</a></div>
         <table border="0" width="100%">
            <tr>
                <th>E-mail</th>
                <th>Grupo de Permissões</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($users_list as $us):?>
            <tr>
                <td width="55%"><?php echo $us['email'];?></td>
                <td width="25%"><?php echo $us['name'];?></td>
                <td width="18%"><div class="button button_small_edit"><a href="<?php echo BASE_URL; ?>/Users/edit/<?php echo $us['id']?>">Editar</a></div>
                <div class="button button_small_delet"><a href="<?php echo BASE_URL; ?>/Users/delete/<?php echo $us['id']?>" onclick="return confirm('Deseja exclui o Usuário?')">Excluir</a></div></td>
           
            </tr>
            <?php endforeach;?>
          
        </table>