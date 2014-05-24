<?php
if ($_GET['Link'] == 1) {
$Link1 = "active";
} else if ($_GET['Link'] == 2) {
$Link2 = "active";
} else if ($_GET['Link'] == 3) {
$Link3 = "active";
} else if ($_GET['Link'] == 4) {
$Link4 = "active";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>P5 HRIS</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="<?php echo ASSETS_BACKEND_URL; ?>css/stylesheets.css" rel="stylesheet" type="text/css" />  
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
    <link rel='stylesheet' type='text/css' href='<?php echo ASSETS_BACKEND_URL; ?>css/fullcalendar.print.css' media='print' />
	<link rel="styleSheet" href='<?php echo ASSETS_BACKEND_URL; ?>js/jquery.autocomplete.css' type="text/css" media="all" />
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/jquery/jquery.mousewheel.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/charts/excanvas.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/charts/jquery.flot.js'></script>    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/charts/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/charts/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/sparklines/jquery.sparkline.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/fullcalendar/fullcalendar.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/select2/select2.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/uniform/uniform.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/animatedprogressbar/animated_progressbar.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/cleditor/jquery.cleditor.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/dataTables/jquery.dataTables.min.js'></script>    
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/cookies.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/actions.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/charts.js'></script>
    <script type='text/javascript' src='<?php echo ASSETS_BACKEND_URL; ?>js/plugins.js'></script>
	<script type="text/javascript" src='<?php echo ASSETS_BACKEND_URL; ?>js/jquery.autocomplete.js'></script>
    
</head>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, Aqvatarius
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="<?php echo ASSETS_BACKEND_URL; ?>img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><span class="icon-comment"></span> <a href="#">Messages</a> <a href="#" class="caption red">12</a></li>
                <li><span class="icon-cog"></span> <a href="#">Settings</a></li>
                <li><span class="icon-share-alt"></span> <a href="#">Logout</a></li>
            </ul>
            <div class="info">
                <span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
            </div>
        </div>
		
		<?php include APP_BACKEND_DIR_USER."layouts/sidebar_menu.php"; ?>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget">

            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">Search</button>
            </div>            
            
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            
            <div class="wBlock clearfix">
                <div class="dSpace">
                    <h3>Last visits</h3>
                    <span class="number">6,302</span>                    
                    <span>5,774 <b>unique</b></span>
                    <span>3,512 <b>returning</b></span>
                </div>
                <div class="rSpace">
                    <h3>Today</h3>
                    <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>                                                                                
                    <span>&nbsp;</span>
                    <span>65% <b>New</b></span>
                    <span>35% <b>Returning</b></span>
                </div>
            </div>
            
        </div>
        
    </div>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
                        
            <ul class="buttons">
                             
                <li>
                    <a href="#" class="link_bcPopupSearch"><span class="icon-share-alt"></span><span class="text">Logut</span></a>             
                </li>
            </ul>
            
        </div>
		
		<div class="workplace">