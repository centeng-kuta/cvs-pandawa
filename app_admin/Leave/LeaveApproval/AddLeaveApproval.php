<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
db_connect();
$LeaveApproval = mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
																, Dept.p5_nama_departement
																, Lm.p5_alias, Lm.p5_leave
																, Lt.p5_master_leave_id, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days
																, Lt.p5_year, Lt.p5_progress, Lt.p5_id, Lt.p5_reason, Lt.p5_keterangan, Lt.p5_address
																FROM tbl_leave_trans AS Lt
																INNER JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
																LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
																LEFT JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
																WHERE Lt.p5_id='$_GET[id]'
																");
$LeaveAppr = mysql_fetch_array($LeaveApproval);			
if ($LeaveAppr['p5_master_leave_id'] == 0) {
	$LeaveName = "Special Leave";
	} else {
		$LeaveName = $LeaveAppr['p5_leave'];
			}												
 ?>   
<form action="<?php echo form_action('Leave/LeaveApproval/ActionLeaveApproval.php'); ?>" method="post">
<input type="hidden" value="<?php echo $_GET['id']; ?>" name="LeaveNumber" />
     <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Form Approval <?php echo $LeaveName; ?></h1>
                    </div>
					<div class="block-fluid"> 
                    
						
						<div class="row-form clearfix">
                            <div class="span3">Employee ID</div>
                            <div class="span9"> : <?php echo $LeaveAppr['p5_nip']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Employee Name</div>
                            <div class="span9"> : <?php echo $LeaveAppr['p5_nama']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"> : <?php echo $LeaveAppr['p5_jabatan']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"> : <?php echo $LeaveAppr['p5_nama_departement']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Leave Name</div>
                            <div class="span9"> : <?php echo $LeaveName; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Balances Leave</div>
                            <div class="span9"> : <?php echo $BalancesLeave; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Request Date</div>
                            <div class="span9"> : <?php echo $LeaveAppr['p5_date_request']; ?></div>
                        </div>
<?php
if ($LeaveAppr['p5_progress'] == 0) {
			$check0 = "checked";
			} else if ($LeaveAppr['p5_progress'] == 1) {
				$check1 = "checked";
				} else if ($LeaveAppr['p5_progress'] == 2) {
					$check2 = "checked";
					} else if ($LeaveAppr['p5_progress'] == "3") {
						$check3 = "checked";
						} else if ($LeaveAppr['p5_progress'] == "4") {
							$check4 = "checked";
							} else if ($LeaveAppr['p5_progress'] == "5") {
								$check5 = "checked";
								}
?>
						<div class="row-form clearfix">
                            <div class="span3">Leave On Progress</div>
							<div class="span9">
							<label class="checkbox inline"><input type="radio" value="0" name="status" <?php echo $check0; ?> /> In Manager</label>
							<label class="checkbox inline"><input type="radio" value="1" name="status" <?php echo $check1; ?> /> In HR </label>
							<label class="checkbox inline"><input type="radio" value="2" name="status" <?php echo $check2; ?> /> Accepted </label>
							<label class="checkbox inline"><input type="radio" value="3" name="status" disabled="disabled" <?php echo $check3; ?> /> Rejected By Employee</label>
							<label class="checkbox inline"><input type="radio" value="4" name="status" disabled="disabled" <?php echo $check4; ?> /> Rejected By Manager</label>
							<label class="checkbox inline"><input type="radio" value="5" name="status" <?php echo $check5; ?> /> Rejected By HR</label>
							
							</div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="DatepickerStart" value="<?php echo $LeaveAppr['p5_date_start']; ?>"/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="DatepickerEnd" value="<?php echo $LeaveAppr['p5_date_end']; ?>" /></div>
                        </div> 
	 
						<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" name="TotalDays" id="lama_cuti" value="<?php echo $LeaveAppr['p5_days']; ?>" />
							<font color="red"><?php echo $Info; ?></font></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Reason</div>
                            <div class="span9"><input type="text" name="Reason" value="<?php echo $LeaveAppr['p5_reason']; ?>" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Address</div>
                            <div class="span9"><input type="text" name="Address" value="<?php echo $LeaveAppr['p5_address']; ?>" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Information</div>
                            <div class="span9"><input type="text" name="Information" value="<?php echo $LeaveAppr['p5_keterangan']; ?>" /></div>
                        </div>
						    
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveApproval/ListLeaveApproval.php&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" value="Submit..." name="LeaveApproval"> 
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>
