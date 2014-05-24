<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
$LeaveCat = fetchData("tbl_leave_master","*","p5_id='$_POST[Leave]'");
if ($_POST['Leave'] == "AllLeave") {
	$LeaveCat = "All Leave";
	$LeaveProgress =mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
								, Dept.p5_nama_departement
								, Lm.p5_alias
								, Lt.p5_master_leave_id, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days
								, Lt.p5_year, Lt.p5_progress, Lt.p5_id
								FROM tbl_leave_trans AS Lt
								INNER JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
								LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
								LEFT JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
								WHERE Lt.p5_progress!=2
								AND Emp.p5_id_manajer='$_SESSION[master]' 
								AND Lt.p5_approval='yes'
								ORDER BY Lt.p5_date_start
								")or die(mysql_error());
} else if ($_POST['Leave'] == 0) {
	$LeaveCat = "Special Leave";
	$LeaveProgress =mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
								, Dept.p5_nama_departement
								, Lm.p5_alias
								, Lt.p5_master_leave_id, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days
								, Lt.p5_year, Lt.p5_progress, Lt.p5_id
								FROM tbl_leave_trans AS Lt
								INNER JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
								LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
								LEFT JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
								WHERE Lt.p5_progress!=2
								AND Emp.p5_id_manajer='$_SESSION[master]' 
								AND Lt.p5_approval='yes'
								AND Lt.p5_master_leave_id=0
								ORDER BY Lt.p5_date_start
								")or die(mysql_error());
} else {
	$LeaveCat = $LeaveCat['p5_leave'];
	$LeaveProgress =mysql_query("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
								, Dept.p5_nama_departement
								, Lm.p5_alias
								, Lt.p5_master_leave_id, Lt.p5_date_request, Lt.p5_date_start, Lt.p5_date_end, Lt.p5_days
								, Lt.p5_year, Lt.p5_progress, Lt.p5_id
								FROM tbl_leave_trans AS Lt
								INNER JOIN tbl_emp_employee AS Emp ON Emp.p5_id = Lt.p5_emp_id
								LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
								LEFT JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
								WHERE Lt.p5_progress!=2
								AND Emp.p5_id_manajer='$_SESSION[master]'
								AND Lt.p5_approval='yes'
								AND Lt.p5_master_leave_id='$_POST[Leave]'
								ORDER BY Lt.p5_date_start
								")or die(mysql_error());
}
?>     
        <div class="workplace">
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Leave On Progress for <?php echo $LeaveCat; ?></h1>                               
                    </div>
                     <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortableLeaveApproval">
                            <thead>
                                <tr>
									<th width="5%">Emp. ID</th>
									<th width="15%">Emp. Name</th>
									<th width="15%">Job Title</th>
									<th width="15%">Dept. Name</th>
									<th width="7%">Date Create</th> 
									<th width="9%">Starting Date</th>
									<th width="7%">End Date</th>
									<th width="2%">Days</th>
									<th width="2%">Year</th>  
									<th width="2%">Leave</th>
									<th width="10%">On Progress</th>
									<th width="15%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								while($p=mysql_fetch_array($LeaveProgress)) {
								if ($p['p5_master_leave_id'] == 0) {
									$LeaveName = "SL";
								} else {
									$LeaveName = $p['p5_alias'];
								}
								
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
									<td><?php echo $p['p5_nip']; ?></td>
									<td><?php echo $p['p5_nama']; ?></td>
									<td><?php echo $p['p5_jabatan']; ?></td>
									<td><?php echo $p['p5_nama_departement']; ?></td>
									<td><?php echo $p['p5_date_request']; ?></td>
									<td><?php echo $p['p5_date_start']; ?></td>
									<td><?php echo $p['p5_date_end']; ?></td>
									<td><?php echo $p['p5_days']; ?></td>
									<td><?php echo $p['p5_year']; ?></td>
                                    <td><?php echo $LeaveName; ?></td> 
									<td><?php echo $Progress; ?></td>
									<td><center><?php if ($p['p5_progress'] == 0) { ?><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/TakenReport/DetailTakenReport.php&id=<?php echo $p['p5_id']; ?>&LeaveDel=hapus&LeaveId=<?php echo $p['p5_master_leave_id']; ?>" onClick="return konfirmasi();"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_cancel.png" width="20%" title="View Detail"></a><?php } ?></center></td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
			<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Manager/LeaveApproval/ListLeaveAppr.php&Link=4"><button class="btn" type="button">Back...</button>   
				</p>	
            <div class="dr"><span></span></div>    		
        </div>
    </div>   
<?php
include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>	