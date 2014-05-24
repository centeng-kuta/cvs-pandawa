<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
db_connect();
if($_GET['LeaveCat'] != "SL" and $_GET['LeaveCat'] != "") {
$LeaveCategory = fetchData("tbl_leave_master","*","p5_alias='$_GET[LeaveCat]'");
$ListLeave = mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan, 
							  Dept.p5_nama_departement,
							  LeaveQ.p5_year, LeaveQ.p5_days, LeaveQ.p5_year
							  FROM tbl_emp_employee AS Emp 
							  LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
							  LEFT JOIN tbl_leave_kuota AS LeaveQ ON Emp.p5_id = LeaveQ.p5_emp_id
							  WHERE Emp.p5_id='$_GET[kid]' AND LeaveQ.p5_status=0");
$List = mysql_fetch_array($ListLeave);
 ?> 
<form action="<?php echo form_action('Leave/LeaveMenu/LeaveUser/ActionLeaveUser.php'); ?>" method="post">
<input type="hidden" value="<?php echo $_GET['kid']; ?>" name="EmpId" />
<input type="hidden" value="<?php echo $cuti_number; ?>" name="LeaveNumber" />
<input type="hidden" value="<?php echo $_GET['LeaveId']; ?>" name="LeaveId" />
<input type="hidden" value="<?php echo $_GET['LeaveStatus']; ?>" name="LeaveStatus" />
     <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Form Request <?php echo $LeaveCategory['p5_leave']; ?> by Admin</h1>
                    </div>
					<div class="block-fluid"> 
						
						<div class="row-form clearfix">
                            <div class="span3">Employee ID</div>
                            <div class="span9"><?php echo $List['p5_nip']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Name</div>
                            <div class="span9"><?php echo $List['p5_nama']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"><?php echo $List['p5_jabatan']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><?php echo $List['p5_nama_departement']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="DatepickerStart"/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="DatepickerEnd" /></div>
                        </div> 
	 
						<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" name="TotalDays" id="lama_cuti" value="<?php echo $sum_total; ?>" />
							<font color="red"><?php echo $Info; ?></font></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Reason</div>
                            <div class="span9"><input type="text" name="Reason" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Address / Destination</div>
                            <div class="span9"><input type="text" name="Address" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Information</div>
                            <div class="span9"><input type="text" name="Information" /></div>
                        </div> 
						    
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveUser/ListLeaveUser.php&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" value="Submit..." name="LeaveUserInsert"> 
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		
<?php } else if ($_GET['LeaveCat'] == "SL") {
$ListLeave = mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan, 
							  Dept.p5_nama_departement,
							  LeaveQ.p5_year, LeaveQ.p5_days, LeaveQ.p5_year
							  FROM tbl_emp_employee AS Emp 
							  LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
							  LEFT JOIN tbl_leave_kuota AS LeaveQ ON Emp.p5_id = LeaveQ.p5_emp_id
							  WHERE Emp.p5_id='$_GET[kid]' AND LeaveQ.p5_status=0");
$List = mysql_fetch_array($ListLeave);
$SpecialLeave = fetchDataAll ("tbl_leave_master_sl","*","p5_id='$_GET[id]'");
foreach ($SpecialLeave as $SL);
?>
<form action="<?php echo form_action('Leave/LeaveMenu/LeaveUser/ActionLeaveUser.php'); ?>" method="post">
<input type="hidden" value="<?php echo $_GET['kid']; ?>" name="EmpId" />
<input type="hidden" value="<?php echo $cuti_number; ?>" name="LeaveNumber" />
<input type="hidden" value="<?php echo $_GET['LeaveId']; ?>" name="LeaveId" />
<input type="hidden" value="<?php echo $_GET['LeaveStatus']; ?>" name="LeaveStatus" />
     <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Form Request Special Leave by Admin</h1>
                    </div>
					<div class="block-fluid"> 
						
						<div class="row-form clearfix">
                            <div class="span3">Employee ID</div>
                            <div class="span9"><?php echo $List['p5_nip']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Name</div>
                            <div class="span9"><?php echo $List['p5_nama']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"><?php echo $List['p5_jabatan']; ?></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><?php echo $List['p5_nama_departement']; ?></div>
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
                            <div class="span3">Starting Date</div>
                            <div class="span9"><input type="text" name="StartingDate" id="startDate"/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">End Date</div>
                            <div class="span9"><input type="text" name="EndDate" id="endDate" /></div>
                        </div> 
	 
						<div class="row-form clearfix">
                            <div class="span3">Total Days</div>
                            <div class="span9"><input type="text" name="TotalDays" id="lama_cuti" value="<?php echo $sum_total; ?>" />
							<font color="red"><?php echo $Info; ?></font></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Reason</div>
                            <div class="span9"><input type="text" name="Reason" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Address / Destination</div>
                            <div class="span9"><input type="text" name="Address" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Information</div>
                            <div class="span9"><input type="text" name="Information" /></div>
                        </div> 
						    
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveUser/ListLeaveUser.php&Link=2"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" value="Submit..." name="LeaveUserInsert"> 
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>
<?php } ?>
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>	