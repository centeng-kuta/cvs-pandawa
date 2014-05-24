<?php require_once '../../../Menus.php';
$psplit = explode("-",$_POST['EmpId']);
$EmployeeId = trim($psplit[0]);
$AbsensiId = trim($psplit[2]);
$EmployeeNumber = trim($psplit[1]);
$EmployeeName = trim($psplit[3]);

$EmpLeave = mysql_query("SELECT EMp.p5_nip, Emp.p5_nama, Emp.p5_jabatan, Dept.p5_nama_departement
						, Lt.p5_id, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days, Lt.p5_reason, Lt.p5_master_leave_id
						, Lm.p5_alias
								 FROM tbl_emp_employee AS EMp 
								 LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
								 LEFT JOIN tbl_leave_trans AS Lt ON Lt.p5_emp_id = Emp.p5_id
								 LEFT JOIN tbl_leave_master AS Lm ON Lm.p5_id = Lt.p5_master_leave_id
								 WHERE Emp.p5_id='$EmployeeId'
								 AND Lt.p5_progress=2")or die(mysql_error());

 ?> 
 <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>History Leave For Employee</h1>      
                        <ul class="buttons">
                            <li><a href="#" class="isw-download"></a></li>                                                        
                            <li><a href="#" class="isw-attachment"></a></li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                            <thead>
                                <tr>                                    
                                    <th width="10%">Leave Number</th>
                                    <th width="10%">Starting Date</th>
                                    <th width="10%">End Date</th>
                                    <th width="5%">Days</th>
									<th width="55%">Reason</th>
									<th width="10%">Leave Name</th>
                                </tr>
                            </thead>
                            <tbody>
						<?php 
						while($EmpL = mysql_fetch_array($EmpLeave)) {
						if ($EmpL['p5_master_leave_id'] == 0) {
									$LeaveName = "SL";
								} else {
									$LeaveName = $EmpL['p5_alias'];
								}	
						?>
                                <tr>                                    
                                    <td nowrap="nowrap"><?php echo $EmpL['p5_id']; ?></td>
									<td nowrap="nowrap"><?php echo $EmpL['p5_date_start']; ?></td>
									<td><?php echo $EmpL['p5_date_end']; ?></td>
									<td nowrap="nowrap"><?php echo $EmpL['p5_days']; ?></td>
									<td nowrap="nowrap"><?php echo $EmpL['p5_reason']; ?></td>
									<td nowrap="nowrap"><?php echo $LeaveName; ?></td>
                                </tr>  
							<?php } ?>								
                            </tbody>
                        </table>
                    </div>
                </div>                                 
            </div>    
			<p align="center">
				<a href="<?php echo $BaseUrl; ?>4dmin/Leave/HistoryLeave/ForEmployee/ListHistoryLeaveForEmployee.php?Link=2"><button class="btn" type="button">Back...</button></a>
			</p>
            <div class="dr"><span></span></div>            
        </div>
    </div>   