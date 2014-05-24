<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?>
<form id="validation" action="<?php echo form_action('MasterData/SpecialLeave/ActionSpecialLeave.php'); ?>" method="post">
     <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Special Leave Add</h1>
                    </div>
                    <div class="block-fluid">                        
                        <div class="row-form clearfix">
                            <div class="span3">Special Leave Name</div>
                            <div class="span9"><input type="text" name="SpecialLeaveName" class="validate[required]"/></div>
                        </div> 
						<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" name="TotalDays" class="validate[required]"/></div>
                        </div> 
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/ListSpecialLeave.php&Link=1"><button class="btn" type="button">Back</button></a> &nbsp;
				<button class="btn" id="btnSubmit" type="submit" name="SpecialLeaveInsert" value="Submit" >Submit</button>
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>