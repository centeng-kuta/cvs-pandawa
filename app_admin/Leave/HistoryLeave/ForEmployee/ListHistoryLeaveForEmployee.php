<?php require_once '../../../Menus.php'; ?> 
 <form action="ResultHistoryLeaveForEmployee.php" method="post"> 
     <div class="workplace">
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>History Leave For Employee</h1>
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
				<a href="<?php echo $BaseUrl; ?>4dmin/Leave/HistoryLeave/ForEmployee/ListHistoryLeaveForEmployee.php?Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" name="LeaveForEmployee" value="Submit...">
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>  