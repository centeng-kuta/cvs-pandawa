<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
db_connect();
$LeaveCat = fetchData("tbl_leave_master","*","p5_id='$_GET[LeaveId]'");
$LeaveData = mysql_query("SELECT Lt.p5_id, Lt.p5_name, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days, 
												  Lt.p5_year_balances, Lt.p5_master_leave_id, Lt.p5_progress
												  FROM tbl_leave_trans AS Lt
												  INNER JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
												  LEFT JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
												  WHERE Lt.p5_id='$_GET[id]'");
$p = mysql_fetch_array($LeaveData);	
if($p['p5_progress'] == 0) {
									$Progress = "In Manger";
								} else if ($p['p5_progress'] == 1) {
									$Progress = "In HR";
								} else if ($p['p5_progress'] == 2) {
									$Progress = "Accepted";
								} else if ($p['p5_progress'] == 3) {
									$Progress = "Rej. by Employee";
								} else if ($p['p5_progress'] == 4) {
									$Progress = "Rej. by Manager";
								} else if ($p['p5_progress'] == 5) {
									$Progress = "Rej. by HR";
								}											  
?>   
<div class="info">                                                                
                                <ul class="rows">
                                    <li class="heading"><?php echo $LeaveCat['p5_leave']; ?> Info</li>
									
									<li>
                                        <div class="title">Leave Name</div>
                                        <div class="text">: <?php echo $LeaveCat['p5_leave']; ?></div>
                                    </li>
									
                                    <li>
                                        <div class="title">Request Date</div>
                                        <div class="text">: <?php echo $p['p5_date_request']; ?></div>
                                    </li>
									
                                    <li>
                                        <div class="title">Starting Date</div>
                                        <div class="text">: <?php echo $p['p5_date_start']; ?></div>
                                    </li>
									
                                    <li>
                                        <div class="title">End Date</div>
                                        <div class="text">: <?php echo $p['p5_date_end']; ?></div>
                                    </li>
									
                                    <li>
                                        <div class="title">Total Days</div>
                                        <div class="text">: <?php echo $p['p5_days']; ?></div>
                                    </li>
									
                                    <li>
                                        <div class="title">Reason</div>
                                        <div class="text">: <?php echo $p['p5_reason']; ?></div>
                                    </li>
									
                                    <li>
                                        <div class="title">Leave Address </div>
                                        <div class="text">: <?php echo $p['p5_address']; ?></div>
                                    </li>            
									
									<li>
                                        <div class="title">Progress</div>
                                        <div class="text">: <?php echo $Progress; ?></div>
                                    </li>
									
                                </ul>                                                      
                            </div>
<br />							
							<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/Leave/ListLeave.php&id=<?php echo $_GET['LeaveId']; ?>&Link=2"><button class="btn" type="button">Back</button>   
				</p>
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>	