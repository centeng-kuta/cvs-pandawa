<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
 ?> 
 <form action="<?php echo form_action('Leave/TakenReport/ResultTakenReport.php&Link=2'); ?>" method="post"> 
     <div class="workplace">
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Leave Taken Report for Leave Category</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Leave Name</div>
                            <div class="span9"><select name="Leave">
								<option value="AllLeave">All Leave</option>
								<?php
								$MasterOnLeave = fetchDataAll("tbl_leave_master","*","p5_level=0");
									foreach($MasterOnLeave as $MLeave) {
								?>
								<option value="<?php echo $MLeave['p5_id']; ?>"><?php echo $MLeave['p5_leave']; ?></option>
								<?php } ?>
								<option value="0">Special Leave</option>
								</select></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="DatepickerStart" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="DatepickerEnd" /></div>
                        </div> 
                        
                    </div>
                </div>          
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/TakenReport/ListTakenReport.php&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" name="LeaveTakenReport" value="Submit...">
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>  
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>