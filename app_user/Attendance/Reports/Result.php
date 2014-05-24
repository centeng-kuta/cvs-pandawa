<?php 
include APP_BACKEND_DIR_USER.'layouts'.DS.'header.php';
echo "<pre>";
print_r ($_POST);
echo "</pre>";
print_r ($_POST);
if ($_POST['Attendance'] == "Daily") {
	require_once 'ResultDailyAtt.php';
} else if ($_POST['Attendance'] == "Monthly") {
	require_once 'ResultMonthlyAtt.php';
}

include APP_BACKEND_DIR_USER.'layouts'.DS.'footer.php';
?>