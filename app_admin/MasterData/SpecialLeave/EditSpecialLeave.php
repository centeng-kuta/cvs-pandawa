<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
$SpecialLeave = fetchData("tbl_leave_master_sl","*","p5_id=$_GET[id]");
?>
<form id="validation" action="<?php echo form_action('MasterData/SpecialLeave/ActionSpecialLeave.php'); ?>" method="post">        
     <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Special Leave</h1>
                    </div>
                    <div class="block-fluid">                        
                        <input type="hidden" name="id" value="<?php echo $SpecialLeave['p5_id']; ?>" />
                        <div class="row-form clearfix">
                            <div class="span3">Special Leave Name</div>
                            <div class="span9"><input type="text" class="validate[required]" value="<?php echo $SpecialLeave['p5_sl']; ?>" name="SpecialLeaveName" /></div>
                        </div> 

						<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" class="validate[required]" value="<?php echo $SpecialLeave['p5_days']; ?>" name="TotalDays" /></div>
                        </div> 
                        
                    </div>
                </div>
                
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/ListSpecialLeave.php&Link=1"><button class="btn" type="button">Back</button></a> &nbsp;
				<button class="btn" id="btnSubmit" type="submit" name="SpecialLeaveUpdate" value="Submit" >Submit</button>
				</p>
            <div class="dr"><span></span></div>
        
        </div>
</form>		
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>