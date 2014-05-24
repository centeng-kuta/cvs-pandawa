<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
$LeaveCat = fetchData("tbl_leave_master","*","p5_id='$_GET[id]'");
$EmployeeData = mysql_query("SELECT Emp.p5_id, Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
							, Dept.p5_nama_departement
							FROM tbl_emp_employee AS Emp 
							LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
							WHERE Emp.p5_id='$_SESSION[id]'")or die(mysql_error());
$EmpData = mysql_fetch_array($EmployeeData);
 ?>   
<form action="<?php echo form_action('Leave/Leave/ActionLeave.php'); ?>" method="post">
<input type="hidden" value="<?php echo $LeaveCat['p5_status']; ?>" name="LeaveStatus" />
<input type="hidden" value="<?php echo $cuti_number; ?>" name="LeaveNumber" />
<input type="hidden" value="<?php echo $LeaveCat['p5_id']; ?>" name="LeaveId" />
<input type="hidden" value="<?php echo $EmpData['p5_id']; ?>" name="EmpId" />
<input type="hidden" value="<?php echo $LeaveCat['p5_leave']; ?>" name="LeaveName" />
     <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Add New <?php echo $LeaveCat['p5_leave']; ?></h1>
                    </div>
					<div class="block-fluid"> 
					
					<div class="row-form clearfix">
                            <div class="span3">Leave ID</div>
                            <div class="span9"><?php echo $cuti_number; ?></div>
                    </div> 
					
					<div class="row-form clearfix">
                            <div class="span3">Employee ID</div>
                            <div class="span9"><?php echo $EmpData['p5_nip']; ?></div>
                    </div> 
					
					<div class="row-form clearfix">
                            <div class="span3">Employee Name</div>
                            <div class="span9"><?php echo $EmpData['p5_nama']; ?></div>
                    </div> 
					
					<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"><?php echo $EmpData['p5_jabatan']; ?></div>
                    </div>
					
					<div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><?php echo $EmpData['p5_nama_departement']; ?></div>
                    </div>
					
					
					<div class="row-form clearfix">
                            <div class="span3">Leave Balance</div>
                            <div class="span9"></div>
                    </div> 
					
					<div class="row-form clearfix">
						<div class="span3">Special Leave Name</div>
                            <div class="span9">
                                <select name="selectName" id="selectName">
								<option value="0">choose a option...</option>
								<?php 
							$SpecialLeaveList = fetchDataAll ("tbl_leave_master_sl","*");
							foreach ($SpecialLeaveList as $ListSL):
							 ?>
							 <option value="<?php echo $ListSL['p5_id']; ?>"><?php echo $ListSL['p5_sl']; ?></option>
								<?php endforeach; ?> 
                                </select>
                            </div>
						</div>	
						
					<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" name="TotalDays" id="lama_cuti" value="<?php echo $sum_total; ?>" /></div>
                        </div> 	
						
					<div class="row-form clearfix">
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="startDate"/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="end_date" /></div>
                        </div>  
 
					
					<div class="row-form clearfix">
						<div class="span3">Reason</div>
						<div class="span9"><input type="text" name="Reason" /></div>
					</div> 
					
					<div class="row-form clearfix">
						<div class="span3">Address</div>
						<div class="span9"><input type="text" name="Address" /></div>
					</div> 
						    
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/SpecialLeave/ListSpecialLeave.php&id=<?php echo $_GET['id']; ?>&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" value="Submit..." name="LeaveRequest"> 
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>
