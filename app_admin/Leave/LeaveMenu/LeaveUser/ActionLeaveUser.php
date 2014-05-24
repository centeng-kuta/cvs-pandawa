<?php
ob_start();
require_once '../../../conn.php';
$DateNow = date("Y-m-d");
if ($_POST['LeaveUserInsert']) {
$tanggal = date ("Y-m-d");
$y = date("Y");
echo "<pre>";
print_r ($_POST);
echo "</pre>";
//SPECIAL LEAVE
if ($_POST['LeaveId'] == "") {
// mysql_query("INSERT INTO tbl_leave_trans(p5_id, p5_emp_id, p5_name, p5_master_leave_id, p5_sl_id, p5_year, p5_date_request, p5_date_start, p5_date_end, 
		// p5_days, p5_address, p5_reason, p5_status, p5_progress, p5_keterangan, p5_year_balances) 
		// VALUES ('$_POST[LeaveNumber]', '$_POST[EmpId]', '-', '0', '0', '$y', '$DateNow', '$_POST[StartingDate]', '$_POST[EndDate]', 
		// '$_POST[TotalDays]', '$_POST[Address]', '$_POST[Reason]', '$_POST[LeaveStatus]', '2', '$_POST[Information]', '$y')");
} else {
// mysql_query("INSERT INTO tbl_leave_trans(p5_id, p5_emp_id, p5_name, p5_master_leave_id, p5_sl_id, p5_year, p5_date_request, p5_date_start, p5_date_end, 
		// p5_days, p5_address, p5_reason, p5_status, p5_progress, p5_keterangan, p5_year_balances) 
		// VALUES ('$_POST[LeaveNumber]', '$_POST[EmpId]', '-', '$_POST[LeaveId]', '0', '$y', '$DateNow', '$_POST[StartingDate]', '$_POST[EndDate]', 
		// '$_POST[TotalDays]', '$_POST[Address]', '$_POST[Reason]', '$_POST[LeaveStatus]', '2', '$_POST[Information]', '$y')");
}		
		// header("Location:ListLeaveUser.php?Link=2");
}
?>