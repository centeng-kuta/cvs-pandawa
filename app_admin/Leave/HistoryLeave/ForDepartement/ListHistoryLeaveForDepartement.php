<?php require_once '../../../Menus.php'; ?> 
 <form action="ResultHistoryLeaveForDepartement.php" method="post"> 
     <div class="workplace">
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Daily Report For Departement Menu</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><select name="DeptId">
								<option value="AllDepartement">All Departement</option>
								<?php
								$MasterDepartement = fetchDataAll ("tbl_emp_departement","*")or die(mysql_error());
								foreach ($MasterDepartement as $md) {
								?>
								<option value="<?php echo $md['p5_id']; ?>"><?php echo $md['p5_nama_departement']; ?></option>
								<?php } ?>
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
				<a href="<?php echo $BaseUrl; ?>4dmin/Leave/HistoryLeave/ForDepartement/ListHisotoryLeaveForDepartement.php?Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" name="LeaveForDepartement" value="Submit...">
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>  