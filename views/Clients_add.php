<h1>Cliente - Adcionar</h1>

<?php if(isset($error_msg) && !empty($error_msg)):?>
<div class="warn"><?php echo $error_msg;?></div>
<?php endif;?>


<form method="POST">
    <label for="name">Nome</label></br>
    <input type="text" name="name" required/></br>
    <label for="email">E-mail</label></br>
    <input type="email" name="email" /></br>
    <label for="phone">Telefone</label></br>
    <input type="text" name="phone" /></br>

    <label for="stars">Estrelas</label></br>
    <select name="stars" id="stars">
        <option value="1">1 Estrelas</option>
        <option value="2">2 Estrelas</option>
        <option value="3" selected="selected">3 Estrelas</option>
        <option value="4">4 Estrelas</option>
        <option value="5">5 Estrelas</option>
    </select></br></br>
   
    <label for="internal_obs">Observações Internas</label></br>
    <textarea name="internal_obs" id="internal_obs"></textarea><br/>   
    <label for="addres_zipcode">CEP</label></br>
    <input type="text" name="addres_zipcode"/></br>
    <label for="addres">Rua</label></br>
    <input type="text" name="addres"/></br></br>
    <label for="addres_number1">Número</label></br>
    <input type="text" name="addres_number1"/></br></br>
    <label for="addres_number2">Complemento</label></br>
    <input type="text" name="addres_number2"/></br></br>
    <label for="addres_neighb">Bairro</label></br>   
    <input type="text" name="addres_neighb"/></br>
    <label for="addres_city">Cidade</label></br>
    <input type="text" name="addres_city"/></br>
    <label for="addres_state">Estado</label></br>
    <input type="text" name="addres_state"/></br>
    <label for="addres_country">Pais</label></br>
    <input type="text" name="addres_country"/></br></br>
    <input type="submit" value="Salvar"/></br>
</form>

<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script_clients_add.js"></script>