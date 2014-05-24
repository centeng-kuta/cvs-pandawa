<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?>
 
<div class="info">                                                                
	<ul class="rows">
		<div class="head clearfix">
			<div class="isw-documents"></div>
			<h1>Special Leave Detail</h1>
		</div>
		<li>
			<div class="title">Special Leave Name</div>
			<div class="text">: </div>
		</li>     
		<li>
			<div class="title">Total Days</div>
			<div class="text">: </div>
		</li>  		
	</ul> 
	
	<br />
	<p align="center">
		<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/ListSpecialLeave.php&Link=1"><button class="btn" type="button">Back</button></a> &nbsp;
		<button class="btn" id="btnSubmit" type="submit" name="SpecialLeaveEdit" value="Submit" >Edit</button>
	</p>	
	<div class="dr"><span></span></div>
</div>  

<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>