</br>
<h1>Group - Adcionar</h1>
<form method="POST">
    <label for="name">Nome do Group</label><br/>
    <input type="text" name="name" autofocus/><br/><br/>
    <label>Permissões</label></br>
    <?php foreach ($permissions_list as $p): ?>
        <div class="p_item">
        <input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?>" id="p_<?php echo $p['id']; ?>"/>
        <label for="p_<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label><br/>
        </div>
         <?php endforeach; ?></br></br>
        <input type="submit" value="Adicionar"/>
</form>