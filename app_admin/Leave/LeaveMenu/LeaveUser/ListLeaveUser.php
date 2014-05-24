<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?> 
        <div class="workplace">
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Request Employee Leave by Admin</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortableLeaveUser">
                            <thead>
                                <tr>
                                    <th width="10%">Employee ID</th>
                                    <th width="25%">Name</th>
									<th width="20%">Job Title</th>
									<th width="20%">Departement Name</th>
									<th width="10%">Balances</th>
									<th width="15%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$TanggalSekarang = date ("Y-m-d");
								$karyawan = mysql_query ("SELECT Emp.p5_nip, Emp.p5_nama, Emp.p5_id, Emp.p5_jabatan, Emp.p5_awal_kerja,
															Dept.p5_nama_departement
															 FROM tbl_emp_employee AS Emp  
															 LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
															 LEFT JOIN tbl_leave_kuota AS Lq ON Emp.p5_id = Lq.p5_emp_id")or die(mysql_error());			
								while($k = mysql_fetch_array($karyawan)) {
?> 
                                <tr>
                                    <td><?php echo $k['p5_nip']; ?></td>
                                    <td><?php echo $k['p5_nama']; ?></td>
									<td><?php echo $k['p5_jabatan']; ?></td>
									<td><?php echo $k['p5_nama_departement']; ?></td>
									<td><?php echo $k['SisaCuti']; ?></td>
									<td>
									<?php
									$MasterOnLeave = fetchDataAll("tbl_leave_master","*","p5_level=0");
									foreach($MasterOnLeave as $MLeave) {
									?>
									(<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveUser/AddLeaveUser.php&kid=<?php echo $k[p5_id]; ?>&LeaveCat=<?php echo $MLeave[p5_alias]; ?>&JumlahCuti=<?php echo $SisaCuti; ?>&LeaveId=<?php echo $MLeave['p5_id']; ?>&LeaveStatus=<?php echo $MLeave['p5_status']; ?>&Link=2"><?php echo $MLeave[p5_alias]; ?></a>)
									<?php
									}
									?>
									<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/LeaveMenu/LeaveUser/AddLeaveUser.php&kid=<?php echo $k[p5_id]; ?>&LeaveCat=SL&JumlahCuti=<?php echo $SisaCuti; ?>&Link=2">(SL)</a> 
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