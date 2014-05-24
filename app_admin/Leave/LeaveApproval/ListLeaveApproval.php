<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?> 
<div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>List Leave Approval</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortableLeaveApproval">
                            <thead>
                                <tr>
                                    <th width="5%">Emp. ID</th>
                                    <th width="15%">Emp. Name</th>
									<th width="14%">Job Title</th>
									<th width="15%">Dept. Name</th>
									<th width="7%">Leave Name</th>
									<th width="7%">Req. Date</th>
									<th width="8%">Starting Date</th>
									<th width="7%">End Date</th>
									<th width="3%">Days</th>
									<th width="3%">Year</th>
									<th width="11%">Progress</th>
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$LeaveApproval = mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
																, Dept.p5_nama_departement
																, Lm.p5_alias
																, Lt.p5_master_leave_id, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days
																, Lt.p5_year, Lt.p5_progress, Lt.p5_id
																FROM tbl_leave_trans AS Lt
																INNER JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
																LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
																LEFT JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
																WHERE Lt.p5_progress!=2
																AND Lt.p5_approval='yes'
																");
								while($LeaveAppr = mysql_fetch_array($LeaveApproval)) {
								if ($LeaveAppr['p5_master_leave_id'] == 0) {
									$LeaveName = "SL";
								} else {
									$LeaveName = $LeaveAppr['p5_alias'];
								}
								if($LeaveAppr['p5_progress'] == 0) {
									$Progress = "In Manger";
								} else if ($LeaveAppr['p5_progress'] == 1) {
									$Progress = "In HR";
								} else if ($LeaveAppr['p5_progress'] == 2) {
									$Progress = "Accepted";
								} else if ($LeaveAppr['p5_progress'] == 3) {
									$Progress = "Rej. by Employee";
								} else if ($LeaveAppr['p5_progress'] == 4) {
									$Progress = "Rej. by Manager";
								} else if ($LeaveAppr['p5_progress'] == 5) {
									$Progress = "Rej. by HR";
								}
							?>
                                <tr>
                                    <td><?php echo $LeaveAppr['p5_nip']; ?></td>
									<td><?php echo $LeaveAppr['p5_nama']; ?></td>
									<td><?php echo $LeaveAppr['p5_jabatan']; ?></td>
									<td><?php echo $LeaveAppr['p5_nama_departement']; ?></td>
									<td><?php echo $LeaveName; ?></td>
									<td><?php echo $LeaveAppr['p5_date_request']; ?></td>
									<td><?php echo $LeaveAppr['p5_date_start']; ?></td>
									<td><?php echo $LeaveAppr['p5_date_end']; ?></td>
									<td><?php echo $LeaveAppr['p5_days']; ?></td>
									<td><?php echo $LeaveAppr['p5_year']; ?></td>
                                    <td><?php echo $Progress; ?></td> 
									<td><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveApproval/AddLeaveApproval.php&id=<?php echo $LeaveAppr['p5_id']; ?>&Link=2">Process</a></td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>           
            <div class="dr"><span></span></div>            
        </div>
    </div>   
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>	