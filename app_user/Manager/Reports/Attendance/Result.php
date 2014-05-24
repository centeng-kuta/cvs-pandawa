<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
	if ($_POST['EmpName'] == "AllEmp") {
		$Condition = "Emp.p5_id_manajer='$_SESSION[master]'";
	} else {
		$Condition = "Emp.p5_id='$_POST[EmpName]'";
	}
if ($_POST['Attendance'] == "Daily") {
	require_once 'ResultDailyAtt.php';
} else if ($_POST['Attendance'] == "Monthly") {
	require_once 'ResultMonthlyAtt.php';
}

include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>