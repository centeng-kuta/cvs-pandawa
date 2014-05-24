<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?>
        
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Employee List</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortableEmployee">
                            <thead>
                                <tr>
                                    <th width="10%">Emp ID</th>
									<th width="30%">Emp Name</th>
									<th width="20%">Job Title</th>
                                    <th width="30%">Departement Name</th>   
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$EmployeeData = mysql_query("SELECT Emp.p5_id, Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan
															, Dept.p5_nama_departement
															FROM tbl_emp_employee AS Emp 
															LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id");
								while($EmpData = mysql_fetch_array($EmployeeData)) {
							?>
                                <tr>
                                    <td><?php echo $EmpData['p5_nip']; ?></td>
									<td><?php echo $EmpData['p5_nama']; ?></td>
									<td><?php echo $EmpData['p5_jabatan']; ?></td>
                                    <td><?php echo $EmpData['p5_nama_departement']; ?></td> 
									<td><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Employee/EditEmployee.php?id=<?php echo $EmpData['p5_id']; ?>"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_edit.png" width="20%" title="Edit this File"></a> &nbsp; 
									<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=ActionDepartement.php&id=<?php echo $EmpData['p5_id']; ?>&EmpDel=hapus" onClick="return konfirmasi();"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_cancel.png" width="20%" title="Delete this File"></a></td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>           
				<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Employee/AddEmployee.php&Link=1"><button class="btn" type="button">Add</button>   
				</p>
            <div class="dr"><span></span></div>            
        </div>
    </div>   
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>	