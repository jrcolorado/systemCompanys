<html>
    <head>
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.0.0.min.js"></script>
        <script type="text/javascript"> var BASE_URL = '<?php echo BASE_URL; ?>';</script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
    </head>
    
    <body>
        <div class="leftmenu">
            <div class="company_name"><?php echo $viewData['company_name']; ?>
            </div>
             <div class="menuarea">
            <ul>
                <li><a href="<?php echo BASE_URL;?>">Home</a></li>
                <li><a href="<?php echo BASE_URL;?>/Permissions">Permissões</a></li>
                <li><a href="<?php echo BASE_URL;?>/Users">Usuários</a></li>
                <li><a href="<?php echo BASE_URL;?>/Clients">Clientes</a></li>
                <li><a href="<?php echo BASE_URL;?>/Inventory">Estoque</a></li>
                <li><a href="<?php echo BASE_URL.'/Login/logout';?>">Sair</a></li>
            </ul>
        </div> 
        </div>
      
        <div class="conteiner">
            <div class="top">
               
                <div class="top_right"><?php echo "Usuário: ".$user_email;?></div>
           </div>
        </div>
        <div class="area">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
 </body>
</html>