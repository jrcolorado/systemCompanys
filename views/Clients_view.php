<h1>Dados do Cliente</h1>

<?php if(isset($error_msg) && !empty($error_msg)):?>
<div class="warn"><?php echo $error_msg;?></div>
<?php endif;?>


<form method="POST">
    <label for="name">Nome</label></br>
    <input type="text" name="name" readonly="readonly" value="<?php echo $client_info['name'];?>"/></br>
    <label for="email">E-mail</label></br>
    <input type="email" name="email" readonly="readonly" value="<?php echo $client_info['email'];?>"/></br>
    <label for="phone">Telefone</label></br>
    <input type="text" name="phone" readonly="readonly" value="<?php echo $client_info['phone'];?>"/></br>

    <label for="stars">Estrelas</label></br>
    <select name="stars" readonly="readonly" id="stars">
        <option value="1" <?php echo ($client_info['stars']==1)?'selected="selected"':'';?>>1 Estrelas</option>
        <option value="2" <?php echo ($client_info['stars']==2)?'selected="selected"':'';?>>2 Estrelas</option>
        <option value="3" <?php echo ($client_info['stars']==3)?'selected="selected"':'';?>>3 Estrelas</option>
        <option value="4" <?php echo ($client_info['stars']==4)?'selected="selected"':'';?>>4 Estrelas</option>
        <option value="5" <?php echo ($client_info['stars']==5)?'selected="selected"':'';?>>5 Estrelas</option>
    </select></br></br>
   
    <label for="internal_obs">Observações Internas</label></br>
    <textarea name="internal_obs" readonly="readonly" id="internal_obs"><?php echo $client_info['internal_obs'];?></textarea><br/>   
    
    <label for="addres_zipcode">CEP</label></br>
    <input type="text" name="addres_zipcode" readonly="readonly" value="<?php echo $client_info['addres_zipcode'];?>"/></br>
    <label for="addres">Rua</label></br>
    <input type="text" name="addres" readonly="readonly" value="<?php echo $client_info['addres'];?>"/></br></br>
    <label for="addres_number1">Número</label></br>
    <input type="text" name="addres_number1" readonly="readonly" value="<?php echo $client_info['addres_number1'];?>"/></br></br>
    <label for="addres_number2">Complemento</label></br>
    <input type="text" name="addres_number2" readonly="readonly" value="<?php echo $client_info['addres_number2'];?>"/></br></br>
    <label for="addres_neighb">Bairro</label></br>   
    <input type="text" name="addres_neighb" readonly="readonly" value="<?php echo $client_info['addres_neighb'];?>"/></br>
    <label for="addres_city">Cidade</label></br>
    <input type="text" name="addres_city" readonly="readonly" value="<?php echo $client_info['addres_city'];?>"/></br>
    <label for="addres_state">Estado</label></br>
    <input type="text" name="addres_state" readonly="readonly" value="<?php echo $client_info['addres_state'];?>"/></br>
    <label for="addres_country">Pais</label></br>
    <input type="text" name="addres_country" readonly="readonly" value="<?php echo $client_info['addres_country'];?>"/></br></br>
   
</form>
