<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
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
                                    <th width="25%">Leave Name</th>
                                    <th width="15%">Date Create</th>   
									<th width="15%">Starting Date</th>
									<th width="15%">End Date</th>
									<th width="10%">Days</th>
									<th width="10%">Year</th>
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query =mysql_query("SELECT distinct(p5_date_start), Lt.p5_id, Lt.p5_name, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days, Lt.p5_year_balances, Lt.p5_master_leave_id
												  FROM tbl_leave_trans AS Lt
												  INNER JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
												  WHERE Lt.p5_master_leave_id='$_GET[id]' AND Lm.p5_level=1 
												  ")or die(mysql_error());
								while($p=mysql_fetch_array($query)) {
							?>
                                <tr>
                                    <td><?php echo $p['p5_name']; ?></td>
									<td><?php echo $p['p5_date_request']; ?></td>
									<td><?php echo $p['p5_date_start']; ?></td>
									<td><?php echo $p['p5_date_end']; ?></td>
									<td><?php echo $p['p5_days']; ?></td>
                                    <td><?php echo $p['p5_year_balances']; ?></td> 
									<td><center><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveAdmin/EditLeaveAdmin.php&id=<?php echo $p['p5_id']; ?>&Link=2"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_edit.png" width="20%" title="Edit this File"></a> &nbsp; 
									<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveAdmin/ActionLeaveAdmin.php&id=<?php echo $p['p5_id']; ?>&LeaveAdminDel=hapus&LeaveId=<?php echo $p['p5_master_leave_id']; ?>" onClick="return konfirmasi();"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_cancel.png" width="20%" title="Delete this File"></a></center></td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
			<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveAdmin/AddLeaveAdmin.php&id=<?php echo $_GET['id']; ?>&Link=2"><button class="btn" type="button">Add</button>   
				</p>	
            <div class="dr"><span></span></div>    		
        </div>
    </div>   
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>	