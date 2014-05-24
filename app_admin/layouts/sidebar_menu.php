<ul class="navigation">            
            <li class="active">
                <a href="<?php echo BASE_URL; ?>?q=app_admin/index.php">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li class="openable <?php echo $Link1; ?>?q=">
                <a href="#"><span class="isw-list"></span><span class="text">Master Data</span></a>
					<ul>
						<li><a href="?q=MasterData/Departement/ListDepartement.php&Link=1"><span class="icon-th"></span><span class="text">Departement List</span></a></li>          
						<li><a href="?q=MasterData/Employee/ListEmployee.php&Link=1"><span class="icon-th-large"></span><span class="text">Employee List</span></a></li>                     
						<li><a href="?q=MasterData/SpecialLeave/ListSpecialLeave.php&Link=1"><span class="icon-chevron-right"></span><span class="text">Special Leave List</span></a></li>                  
					</ul>                
            </li>   
			
			<li class="openable <?php echo $Link2; ?>?q=">
                <a href="#"><span class="isw-list"></span><span class="text">Leave Application</span></a>
					<ul>
						<li class="open2"><a href="#"><span class="icon-th"></span><span class="text">Request Leave Menu</span></a>
							<ul>
								<?php
									db_connect();
									$MasterOnLeave = fetchDataAll("tbl_leave_master","*","p5_level=1");
									foreach($MasterOnLeave as $MLeave) {
								?>
								<li><a href="?q=Leave/LeaveMenu/LeaveAdmin/ListLeaveAdmin.php&id=<?php echo $MLeave['p5_id']; ?>?q=&Link=2"><span class="icon-th"></span><span class="text">Create <?php echo $MLeave['p5_leave']; ?></span></a></li>
								<?php } ?>
								<li><a href="?q=Leave/LeaveMenu/LeaveUser/ListLeaveUser.php&Link=2"><span class="icon-th"></span><span class="text">Request Leave by Admin</span></a></li>
							</ul>
						</li> 
						
						<li><a href="?q=Leave/LeaveApproval/ListLeaveApproval.php&Link=2"><span class="icon-th-large"></span><span class="text">Leave Approval</span></a></li>                     
						<li><a href="?q=Leave/CrLeaveBalances.php&Link=2"><span class="icon-chevron-right"></span><span class="text">Setup Leave Quota</span></a></li>
						<li><a href="?q=Leave/DeleteLeave/ListDeleteLeave.php&Link=2"><span class="icon-chevron-right"></span><span class="text">Delete on Leave</span></a></li>
						<li><a href="#"><span class="icon-chevron-right"></span><span class="text">Report Leave</span></a>
							<ul>
								<li><a href="#"><span class="icon-chevron-right"></span><span class="text">History Leave</span></a>
									<ul>
										<li><a href="?q=Leave/HistoryLeave/ForEmployee/ListHistoryLeaveForEmployee.php&Link=2"><span class="icon-chevron-right"></span><span class="text-2">History Leave Employee</span></a></li>
										<li><a href="?q=Leave/HistoryLeave/ForDepartement/ListHistoryLeaveForDepartement.php&Link=2"><span class="icon-chevron-right"></span><span class="text-2">History Leave Departement</span></a></li>
									</ul>
								</li>
								<li><a href="?q=Leave/BalancesLeave.php&Link=2"><span class="icon-chevron-right"></span><span class="text">Balance Leave</span></a></li>
								<li><a href="?q=Leave/ApprovedLeave.php&Link=2"><span class="icon-chevron-right"></span><span class="text">Approved Leave</span></a></li>
							</ul>
						</li>
					</ul>                
            </li>
			<li class="openable <?php echo $Link3; ?>?q=">
                <a href="#"><span class="isw-list"></span><span class="text">Attendance Application</span></a>
					<ul>
						<li><a href="#"><span class="icon-th"></span><span class="text">Maintenance Timetable</span></a></li>          
						<li><a href="#"><span class="icon-th-large"></span><span class="text">Employee Schedule</span></a>
							<ul>
								<li><a href="?q=Attendance/EmployeeSchedule/NonShift/ListNonShift.php&Link=3"><span class="icon-th"></span><span class="text">Non Shift</span></a></li> 
								<li><a href="?q=Attendance/EmployeeSchedule/Shift/ListShift.php?Link=3"><span class="icon-th"></span><span class="text">Shift</span></a></li> 
							</ul>
							
						</li>                     
						<li><a href="#"><span class="icon-chevron-right"></span><span class="text">Report Attendance</span></a>
							<ul>
								<li><a href="?q=Attendance/Reports/DailyReportForEmployee/ListDailyReportForEmployee.php&Link=3"><span class="icon-th"></span><span class="text">Daily For Employee</span></a></li>
								<li><a href="?q=Attendance/Reports/MonthlyReportForEmployee/ListMonthlyReportForEmployee.php&Link=3"><span class="icon-th"></span><span class="text">Monthly For Employee</span></a></li>
								<li><a href="?q=Attendance/Reports/DailyReportForDepartement/ListDailyReportForDepartement.php&Link=3"><span class="icon-th"></span><span class="text">Daily For Departement</span></a></li>
								<li><a href="?q=Attendance/Reports/MonthlyReportForDepartement/ListMonthlyReportForDepartement.php&Link=3"><span class="icon-th"></span><span class="text">Monthly For Departement</span></a></li>
							</ul>
						</li>                  
					</ul>                
            </li>
			
			<li class="openable <?php echo $link4; ?>">
                <a href="#"><span class="isw-list"></span><span class="text">Payroll Application</span></a>
					<ul>
						<li><a href="#"><span class="icon-th"></span><span class="text">Setup Salary</span></a></li>          
						<li><a href="#"><span class="icon-th-large"></span><span class="text">Report Salary</span></a>                   
							<ul>
								<li><a href="#"><span class="icon-th"></span><span class="text">Salary Slip</span></a></li>
								<li><a href="#"><span class="icon-th"></span><span class="text">Income Detail</span></a></li>
								<li><a href="#"><span class="icon-th"></span><span class="text">Monthly Salary Detail</span></a></li>
							</ul>
						</li>  
					</ul>                
            </li>

			<li class="openable <?php echo $link5; ?>">
				<a href="#"><span class="isw-list"></span><span class="text">Menu revisi</span></a>
				<ul>
						<li><a href="#"><span class="icon-th"></span><span class="text">Setup Salary</span></a></li>
						<li><a href="#"><span class="icon-th-large"></span><span class="text">Report Salary</span></a>
							<ul>
								<li><a href="#" title="link">link item</a>
									<ul>
										<li><a href="#" title="link">link item</a>
										<a href="#" title="link">link item</a>
										<a href="#" title="link">link item</a>
										</li>
									</ul>
								
								
								</li>
								<li><a href="#" title="link">link item</a>
									<ul>
										<li><a href="#" title="link">link item</a>
										<a href="#" title="link">link item</a>
										<a href="#" title="link">link item</a>
										</li>
									</ul>
								
								
								</li>
							</ul>
						</li>
				</ul>
            </li>     
        </ul>
