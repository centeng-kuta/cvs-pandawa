<?php
db_connect();
$DateNow = date("Y-m-d");
if ($_POST['LeaveAdminInsert']) {
		$Employee = fetchDataAll("tbl_emp_employee","*");
		foreach ($Employee as $Emp) {
			mysql_query("INSERT INTO tbl_leave_trans (p5_id, p5_emp_id, p5_name, p5_master_leave_id, p5_sl_id, p5_year, p5_date_request, p5_date_start, p5_date_end, p5_days, p5_address, p5_reason, p5_status, p5_progress, p5_keterangan, p5_year_balances) VALUES 
						('$_POST[LeaveNumber]', '$Emp[p5_id]', '$_POST[LeaveName]', '$_POST[LeaveId]', '0', '$_POST[y]', '$DateNow', '$_POST[StartingDate]', '$_POST[EndDate]', '$_POST[TotalDays]', '-', '-', '$_POST[LeaveStatus]', '2', '-', '$_POST[y]')")or die(mysql_error());
			header("Location:".ASSETS_BACKEND_DIR."?q=Leave/LeaveMenu/LeaveAdmin/ListLeaveAdmin.php&id=$_POST[LeaveId]&Link=2");
			}
		} else if ($_GET['LeaveAdminDel'] == "hapus") {
			mysql_query("DELETE FROM tbl_leave_trans WHERE p5_id='$_GET[id]'");
			header("Location:".ASSETS_BACKEND_DIR."?q=Leave/LeaveMenu/LeaveAdmin/ListLeaveAdmin.php&id=$_GET[LeaveId]&Link=2");
			} else if ($_POST['LeaveAdminUpdate']) {
			mysql_query("UPDATE tbl_leave_trans SET p5_name='$_POST[LeaveName]', p5_year='$_POST[y]', p5_date_start='$_POST[StartingDate]', p5_date_end='$_POST[EndDate]', p5_days='$_POST[TotalDays]' WHERE p5_id='$_POST[id]'")or die(mysql_error());
			header("Location:".ASSETS_BACKEND_DIR."?q=Leave/LeaveMenu/LeaveAdmin/ListLeaveAdmin.php&id=$_POST[LeaveId]&Link=2");
			}
?>