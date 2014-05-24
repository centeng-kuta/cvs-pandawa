<?php require_once '../../Menus.php'; ?> 
 <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daily Report For Departement</h1>      
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
									<th width="10%">Emp ID & Name</th>
									<th width="10%">Job Title</th>
									<th width="10%">Dept. Name</th>
                                    <th width="7%">Date</th>
                                    <th width="7%">Day</th>
                                    <th width="10%">Working Time</th>
                                    <th width="4%">In</th>
									<th width="4%">Out</th>
									<th width="4%">Status</th>
									<th width="8%">Work Time</th>
									<th width="5%">Late</th>
									<th width="5%">Early</th>
									<th width="10%">OTOD X 1,5</th>
									<th width="10%">OT.OD X 2</th>
									<th width="10%">OT.H X 2</th>
									<th width="10%">OT.H X 3</th>
									<th width="10%">OT.H X 4</th>
									<th width="10%">OT</th>
                                </tr>
                            </thead>
                            <tbody>
<?php  
if ($_POST['DeptId'] == "AllDepartement") {
$Karyawan = mysql_query ("SELECT Emp.p5_id, Emp.p5_id_absensi, Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan, Dept.p5_nama_departement
						 FROM tbl_emp_employee AS Emp 
						 LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id 
						 Order By Emp.p5_nama ASC");
} else {
$Karyawan = mysql_query ("SELECT Emp.p5_id, Emp.p5_id_absensi, Emp.p5_nip, Emp.p5_nama, Emp.p5_jabatan, Dept.p5_id as DepId, Dept.p5_nama_departement
						 FROM tbl_emp_employee AS Emp 
						 LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id 
						 WHERE Dept.p5_id='$DeptId'");	
}
   while($k=mysql_fetch_array($Karyawan)) {
   $pgid = $k['p5_id'];
   $nama = $k['p5_nama'];
   $nipq = $k['p5_nip'];
   $Jabatan = $k['p5_jabatan'];
   $Departement = $k['p5_nama_departement']; 
   $pgidAbsensi = $k['p5_id_absensi'];

	 	
   ?>							
                                <tr>                                    
                                    <td><?php echo $nipq; ?> - <?php echo $nama; ?></td>
									<td><?php echo $Jabatan; ?></td>
									<td><?php echo $Departement; ?></td>
									<td nowrap="nowrap"><?php echo $itemKey; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['DaysName']; ?></td>
									<td><?php echo $JamKerjaMasuk; ?> / <?php echo $JamKerjaPulang; ?></td>
									<td nowrap="nowrap"><?php echo $TransActIn['CheckIn']; ?></td>
									<td nowrap="nowrap"><?php echo $TransActOut['CheckOut']; ?></td>
									<td nowrap="nowrap"><?php echo $StatusAbsen; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['WorkTime']; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['Late']; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['Early']; ?></td>
									<td nowrap="nowrap"><?php echo $OTOD15; ?></td>
									<td nowrap="nowrap"><?php echo $OTOD20; ?></td>
									<td nowrap="nowrap"><?php echo $OTH2; ?></td>
									<td nowrap="nowrap"><?php echo $OTH3; ?></td>
									<td nowrap="nowrap"><?php echo $OTH4; ?></td>
									<td><?php echo $TransAct['OvertimeNoon']; ?></td>
                                </tr>  
<?php } ?>								
                            </tbody>
                        </table>
                    </div>
                </div>                                 
            </div>    
			<p align="center">
				<a href="<?php echo $BaseUrl; ?>4dmin/Leave/HistoryLeave/ForDepartement/ListDailyReportForEmployee.php"><button class="btn" type="button">Back...</button></a>
			</p>
            <div class="dr"><span></span></div>            
        </div>
    </div>   