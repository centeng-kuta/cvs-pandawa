<ul class="navigation">            
	<li class="active">
		<a href="<?php echo BASE_URL; ?>app_user/?q=dashboard/dashboard.php">
			<span class="isw-grid"></span><span class="text">Dashboard</span>
		</a>
	</li>
	
	<li class="openable <?php echo $Link1; ?>">
		<a href="#"><span class="isw-list"></span><span class="text">My Data</span></a>
			<ul>
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Departement/ListDepartement.php&Link=1"><span class="icon-th"></span><span class="text">Education Data</span></a></li>          
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Employee/ListEmployee.php&Link=1"><span class="icon-th-large"></span><span class="text">Family Data</span></a></li>                     
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Personal/ListPersonal.php&Link=1"><span class="icon-chevron-right"></span><span class="text">Personal Data</span></a></li>
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/ListSpecialLeave.php&Link=1"><span class="icon-chevron-right"></span><span class="text">Working Experience</span></a></li>
			</ul>                
	</li>   
			
	<li class="openable <?php echo $Link2; ?>">
		<a href="#"><span class="isw-list"></span><span class="text">Leave Application</span></a>
			<ul>
				<li><a href="#"><span class="icon-th"></span><span class="text">Request Leave Menu</span></a>
					<ul>
						<?php
							db_connect();
							$MasterOnLeave = fetchDataAll("tbl_leave_master","*","p5_level=0");
							foreach($MasterOnLeave as $MLeave) {
						?>
						<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/Leave/ListLeave.php&id=<?php echo $MLeave['p5_id']; ?>&Link=2"><span class="icon-th"></span><span class="text">Request <?php echo $MLeave['p5_leave']; ?></span></a></li>
						<?php } ?>
						<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/SpecialLeave/ListSpecialLeave.php&Link=2"><span class="icon-th"></span><span class="text">Request Special Leave</span></a></li>
					</ul>
				</li> 
						
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Leave/TakenReport/ListTakenReport.php&Link=2"><span class="icon-th"></span><span class="text">Leave Taken Report</span></a></li>                   
			</ul>                
    </li>
			
	<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Attendance/Reports/ListAttReport.php"><span class="isw-list"></span><span class="text">Attendance Report</span></a></li>
			
	<li class="openable <?php echo $link4; ?>">
		<a href="#"><span class="isw-list"></span><span class="text">Businnes Application</span></a>
			<ul>         
				<li><a href="#"><span class="icon-th-large"></span><span class="text">Taxi Voucher Application</span></a>                   
					<ul>
						<li><a href="#"><span class="icon-th"></span><span class="text">Taxi Vocuher Form</span></a></li>
						<li><a href="#"><span class="icon-th"></span><span class="text">Taxi Voucher History</span></a></li>
					</ul>
				</li> 
				
				<li><a href="#"><span class="icon-th-large"></span><span class="text">X Selling Application</span></a>                   
					<ul>
						<li><a href="#"><span class="icon-th"></span><span class="text">X Selling Form</span></a></li>
						<li><a href="#"><span class="icon-th"></span><span class="text">X Selling History</span></a></li>
					</ul>
				</li> 
			</ul>   
	</li>  
			
	<li class="openable <?php echo $Link4; ?>">
		<a href="#"><span class="isw-list"></span><span class="text">Manager Application</span></a>
			<ul>         
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Manager/LeaveApproval/ListLeaveAppr.php&Link=4"><span class="icon-th"></span><span class="text">Approval Leave</span></a></li> 
						
				<li><a href="#"><span class="icon-th-large"></span><span class="text">Approval X Selling</span></a></li>                   
				<li><a href="#"><span class="icon-th"></span><span class="text">Approval Taxi Voucher</span></a></li>
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Manager/Reports/Leave/ListReportLeave.php&Link=4"><span class="icon-th"></span><span class="text">Emp. Report Leave</span></a></li>
				<li><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Manager/Reports/Attendance/ListReportAtt.php&Link=4"><span class="icon-th"></span><span class="text">Emp. Report Attendance</span></a></li>
				<li><a href="#"><span class="icon-th"></span><span class="text">Emp. Report Taxi Voucher</span></a></li>
				<li><a href="#"><span class="icon-th"></span><span class="text">Emp. Report X Selling</span></a></li>
			</ul>   
    </li>  
</ul>