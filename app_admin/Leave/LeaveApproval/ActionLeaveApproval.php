<?php
db_connect();
$DateNow = date("Y-m-d");
if ($_POST['LeaveApproval']) {
	mysql_query("UPDATE tbl_leave_trans SET p5_date_start='$_POST[StartingDate]', p5_date_end='$_POST[EndDate]', p5_days='$_POST[TotalDays]', 
				p5_progress='$_POST[status]' WHERE p5_id='$_POST[LeaveNumber]'")or die(mysql_error());
	header("Location:".ASSETS_BACKEND_DIR."?q=Leave/LeaveApproval/ListLeaveApproval.php&Link=2");
}
?>