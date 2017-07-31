<html>
    <head>
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
          <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet" />
          <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.0.0.min.js"></script>
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
            </ul>
        </div> 
        </div>
      
        <div class="conteiner">
            <div class="top">
                <div class="top_right"><a href="<?php echo BASE_URL.'/Login/logout';?>">Sair</a></div>
                <div class="top_right"><?php echo $user_email;?></div>
           </div>
        </div>
        <div class="area">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
    </body>
</html>