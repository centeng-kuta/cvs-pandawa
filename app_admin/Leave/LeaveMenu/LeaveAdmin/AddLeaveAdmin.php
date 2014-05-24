<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
$LeaveCat = fetchData("tbl_leave_master","*","p5_id='$_GET[id]'");
 ?>   
<form action="<?php echo form_action('Leave/LeaveMenu/LeaveAdmin/ActionLeaveAdmin.php'); ?>" method="post">
<input type="hidden" value="<?php echo $LeaveCat['p5_status']; ?>" name="LeaveStatus" />
<input type="hidden" value="<?php echo $cuti_number; ?>" name="LeaveNumber" />
<input type="hidden" value="<?php echo $LeaveCat['p5_id']; ?>" name="LeaveId" />
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
                            <div class="span9"><input type="text" name="LeaveName" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="DatepickerStart"/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="DatepickerEnd" /></div>
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
                            <div class="span9"><input type="text" name="TotalDays" id="lama_cuti" value="<?php echo $sum_total; ?>" />
							<font color="red"><?php echo $Info; ?></font></div>
                        </div> 
						    
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveAdmin/ListLeaveAdmin.php&id=<?php echo $_GET['id']; ?>&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" value="Submit..." name="LeaveAdminInsert"> 
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>
