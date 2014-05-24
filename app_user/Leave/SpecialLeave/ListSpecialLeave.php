<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
?>     
        <div class="workplace">
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>List Special Leave</h1>                               
                    </div>
                     <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortableLeaveAdmin">
                            <thead>
                                <tr>
									<th width="20%">Leave Name</th>   
                                    <th width="15%">Date Create</th>   
									<th width="15%">Starting Date</th>
									<th width="15%">End Date</th>
									<th width="10%">Days</th>
									<th width="15%">Leave Progress</th>
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query =mysql_query("SELECT Lt.p5_id, Lt.p5_name, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days, 
												  Lt.p5_year_balances, Lt.p5_master_leave_id, Lt.p5_progress,
												  Lm.p5_sl
												  FROM tbl_leave_trans AS Lt
												  LEFT JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
												  LEFT JOIN tbl_leave_master_sl AS Lm ON Lt.p5_sl_id = Lm.p5_id
												  WHERE Emp.p5_id='$_SESSION[id]'
												  AND Lt.p5_sl_id!=0
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
									<td><?php echo $p['p5_sl']; ?></td>
									<td><?php echo $p['p5_date_request']; ?></td>
									<td><?php echo $p['p5_date_start']; ?></td>
									<td><?php echo $p['p5_date_end']; ?></td>
									<td><?php echo $p['p5_days']; ?></td>
									<td><?php echo $Progress; ?></td>
									<td>
									<div class="btn-group">                                        
                                        <button data-toggle="dropdown" class="btn btn-mini">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/SpecialLeave/DetailSpecialLeave.php&id=<?php echo $p['p5_id']; ?>&Link=2">DetaiL Leave</a></li>
                                            <li><?php if ($p['p5_progress'] == 0) { ?><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/SpecialLeave/ActionSpecialLeave.php&id=<?php echo $p['p5_id']; ?>&SpecialLeaveDel=hapus&LeaveId=<?php echo $p['p5_master_leave_id']; ?>" onClick="return konfirmasi();">CanceL Leave</a><?php } ?></li>
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
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/SpecialLeave/AddSpecialLeave.php&Link=2"><button class="btn" type="button">Add</button>   
				</p>	
            <div class="dr"><span></span></div>    		
        </div>
    </div>   
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>	