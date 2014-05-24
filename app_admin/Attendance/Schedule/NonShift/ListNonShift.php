<?php 
require_once '../../../Menus.php'; ?>
        
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Departement List</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="80%">Departement Name</th>   
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$DepartementList = fetchDataAll("tbl_emp_departement","*");
								foreach($DepartementList as $DeptList) {
							?>
                                <tr>
                                    <td><a href="#"><?php echo $DeptList['p5_id']; ?></a></td>
                                    <td><?php echo $DeptList['p5_nama_departement']; ?></td> 
									<td><a href="<?php echo $BaseUrl; ?>4dmin/MasterData/Departement/EditDepartement.php?id=<?php echo $DeptList['p5_id']; ?>"><img src="<?php echo $BaseUrl; ?>img/icons/bb/ic_edit.png" width="20%" title="Edit this File"></a> &nbsp; 
									<a href="ActionDepartement.php?id=<?php echo $DeptList['p5_id']; ?>&DeptDel=hapus" onClick="return konfirmasi();"><img src="<?php echo $BaseUrl; ?>img/icons/bb/ic_cancel.png" width="20%" title="Delete this File"></a></td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>           
				<p align="center">
				<a href="<?php echo $BaseUrl; ?>4dmin/Attendance/EmployeeSchedule/NonShift/AddNonShift.php?Link=3"><button class="btn" type="button">Add</button>   
				</p>
            <div class="dr"><span></span></div>            
        </div>
    </div>   