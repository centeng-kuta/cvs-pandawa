<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
$LeaveCat = fetchData("tbl_leave_master","*","p5_id='$_GET[id]'");
?>     
        <div class="workplace">
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>List <?php echo $LeaveCat['p5_leave']; ?></h1>                               
                    </div>
                     <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortableLeaveAdmin">
                            <thead>
                                <tr>
                                    <th width="15%">Date Create</th>   
									<th width="15%">Starting Date</th>
									<th width="15%">End Date</th>
									<th width="10%">Days</th>
									<th width="10%">Year</th>
									<th width="20%">Leave Progress</th>
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query =mysql_query("SELECT Lt.p5_id, Lt.p5_name, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days, 
												  Lt.p5_year_balances, Lt.p5_master_leave_id, Lt.p5_progress
												  FROM tbl_leave_trans AS Lt
												  INNER JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
												  LEFT JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
												  WHERE Lt.p5_master_leave_id='$_GET[id]'
												  AND Emp.p5_id='$_SESSION[id]'
												  ")or die(mysql_error());
								while($p=mysql_fetch_array($query)) {
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
                                <tr>
									<td><?php echo $p['p5_date_request']; ?></td>
									<td><?php echo $p['p5_date_start']; ?></td>
									<td><?php echo $p['p5_date_end']; ?></td>
									<td><?php echo $p['p5_days']; ?></td>
                                    <td><?php echo $p['p5_year_balances']; ?></td> 
									<td><?php echo $Progress; ?></td>
									<td>
									<div class="btn-group">                                        
                                        <button data-toggle="dropdown" class="btn btn-mini">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/Leave/DetailLeave.php&id=<?php echo $p['p5_id']; ?>&LeaveId=<?php echo $p['p5_master_leave_id']; ?>&Link=2">DetaiL Leave</a></li>
                                            <li><?php if ($p['p5_progress'] == 0) { ?><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/Leave/ActionLeave.php&id=<?php echo $p['p5_id']; ?>&LeaveDel=hapus&LeaveId=<?php echo $p['p5_master_leave_id']; ?>" onClick="return konfirmasi();">CanceL Leave</a><?php } ?></li>
                                        </ul>
                                    </div>
									</td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
			<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/Leave/AddLeave.php&id=<?php echo $_GET['id']; ?>&Link=2"><button class="btn" type="button">Add</button>   
				</p>	
            <div class="dr"><span></span></div>    		
        </div>
    </div>   
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>	