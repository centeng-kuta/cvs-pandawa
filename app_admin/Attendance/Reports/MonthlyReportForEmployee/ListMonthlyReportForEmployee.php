<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?> 
 <form action="<?php echo form_action('Attendance/Reports/MonthlyReportForEmployee/ResultMonthlyReportForEmployee.php&Link=3'); ?>" method="post"> 
     <div class="workplace">
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Monthly Report For Employee Menu</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Employee Name</div>
                            <div class="span9"><input type="text" name="EmpId" id="GetEmployeeId" /></div>
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
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Attendance/Reports/MonthlyReportForEmployee/ListMonthlyReportForEmployee.php&Link=3"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" name="MonthlyReportEmployee" value="Submit...">
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>  
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>