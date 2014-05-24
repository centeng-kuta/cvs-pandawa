<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
$Leave = fetchData("tbl_leave_trans","*","p5_id='$_GET[id]'");
$LeaveCat = fetchData("tbl_leave_master","*","p5_id='$Leave[p5_master_leave_id]'");
 ?>   
<form action="<?php echo form_action('Leave/LeaveMenu/LeaveAdmin/ActionLeaveAdmin.php'); ?>" method="post">
<input type="hidden" value="<?php echo $Leave['p5_id']; ?>" name="id" />
<input type="hidden" value="<?php echo $Leave['p5_master_leave_id']; ?>" name="LeaveId" />
     <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Add New <?php echo $LeaveCat['p5_leave']; ?></h1>
                    </div>
					<div class="block-fluid"> 
                    <div class="row-form clearfix">                        
                        
                     <div class="span3">Year</div>
                            <div class="span9"><select class="form-small" id="year" name="y">
							<option value="<?php echo $Leave['p5_year']; ?>"><?php echo $Leave['p5_year']; ?></value>
        <?php // Generate max years
        $year_built_min = 2010;
        $year_built_max = date("Y");
        
        foreach (range($year_built_max, $year_built_min) as $year) { ?>
        <option value="<?php echo($year); ?>"><?php echo($year); ?></option>
        <?php } ?>
      </select>
                        </div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Leave Category</div>
                            <div class="span9"><input type="text" name="" value="<?php echo $LeaveCat['p5_leave']; ?>" readonly="readonly"/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Leave Name</div>
                            <div class="span9"><input type="text" name="LeaveName" value="<?php echo $Leave['p5_name']; ?>" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="DatepickerStart" value="<?php echo $Leave['p5_date_start']; ?>" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="DatepickerEnd" value="<?php echo $Leave['p5_date_end']; ?>" /></div>
                        </div> 
						<?php
	 if ($LeaveCat['p5_status'] == 0) {
		 	$Info = "Piece Leave";
		 }
	if ($LeaveCat['p5_status'] == 1) {
		 	$Info = "Not Cut Of Leave";
		 }	
	if ($LeaveCat['p5_status'] == 2) {
		 	$Info = "Additonal Leave";
		 }		 
	 ?>
	 
						<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" name="TotalDays" id="lama_cuti" value="<?php echo $Leave['p5_days']; ?>" />
							<font color="red"><?php echo $Info; ?></font></div>
                        </div>  
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveAdmin/ListLeaveAdmin.php&id=<?php echo $Leave['p5_master_leave_id']; ?>&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" value="Submit..." name="LeaveAdminUpdate"> 
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>


