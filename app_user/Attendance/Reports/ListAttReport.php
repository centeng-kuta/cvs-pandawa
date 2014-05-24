<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
 ?> 
 <form action="<?php echo form_action('Attendance/Reports/Result.php'); ?>" method="post"> 
     <div class="workplace">
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Report for Attendance</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Report Category</div>
                            <div class="span9"><select name="Attendance">
								<option value="">chooese a option...</option>
								<option value="Daily">Attendance Daily Report</option>
								<option value="Monthly">Attendance Monthly Report</option>
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
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Attendance/Reports/ListAttReport.php"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" name="AttendanceReport" value="Submit...">
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>  
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>