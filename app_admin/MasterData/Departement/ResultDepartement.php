<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
?>

<div class="info">                                                                
	<ul class="rows">
		<div class="head clearfix">
			<div class="isw-documents"></div>
			<h1>Departement Result</h1>
		</div>
		<li>
			<div class="title">Departement Name</div>
			<div class="text">: <?php echo $_GET[dep_name]?></div>
		</li>     
	</ul> 
	
	<br />
	<p align="center">
		<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Departement/ListDepartement.php&Link=1"><button class="btn" type="button">Done</button></a> &nbsp;
	</p>	
	<div class="dr"><span></span></div>
</div>  

<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>