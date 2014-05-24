<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>Login - Pandawa Lima IT Solution - responsive admin panel</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="<?php echo ASSETS_BACKEND_URL; ?>css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->    
    <link rel='stylesheet' type='text/css' href='<?php echo ASSETS_BACKEND_URL; ?>css/fullcalendar.print.css' media='print' />
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/uniform/uniform.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins.js'></script>
    
</head>
<body>
    
    <div class="loginBox">        
        <div class="loginHead">
            <img src="<?php echo ASSETS_BACKEND_URL; ?>img/logo.png" alt="Aquarius -  responsive admin panel" title=""/>
        </div>
        <form class="form-horizontal" action="<?php echo form_action('CekLogin.php'); ?>" method="POST">            
            <div class="control-group">
                <label for="inputEmail">Username</label>                
                <input type="text" id="inputUsername" name="nip"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" id="inputPassword" name="password"/>                
            </div>
            <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox"> Remember me</label>                                                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>        
        
    </div>    
    
</body>
</html>
