<?php
$DateNow = date("Y-m-d");
$Year = date("Y");
if ($_POST['LeaveRequest']) {
	if ($_POST['LeaveCut'] == 0) {
		$TotalDay = $_POST['TotalDays'];
		$Information = "Full Day";
	} else if ($_POST['LeaveCut'] == 0.5) {
		$TotalDay = $_POST['TotalDays'] - 0.5;
		$Information = "Morning";
	} else if ($_POST['LeaveCut'] == 0.6) {
		$TotalDay = $_POST['TotalDays'] - 0.5;
		$Information = "Noon";
	}
//SEND MAIL
db_connect();
$EmpData = fetchData("tbl_emp_employee","p5_nip, p5_nama, p5_id_manajer, p5_email_kantor, p5_email_lain","p5_id='$_POST[EmpId]'");
$EmpAppr = fetchData("tbl_emp_employee","p5_nip, p5_nama, p5_id_manajer, p5_email_kantor, p5_email_lain","p5_nip='$EmpData[p5_id_manajer]'");

if ($EmpAppr['p5_email_kantor'] == "") {
	$EmailQ = $EmpAppr['p5_email_lain'];
} else if ($EmpAppr['p5_email_lain'] == "") {
	$EmailQ = $EmpAppr['p5_email_kantor'];	
} else if ($EmpAppr['p5_email_lain'] != "" and $EmpAppr['p5_email_kantor'] != "") {
	$EmailQ = $EmpAppr['p5_email_kantor'];
}	
 $from = "LeaveSystem <leave@fivepandava.com>";
 $to = $EmailQ;
 $subject = "REQUEST FOR $_POST[LeaveName] APPROVAL!";

	$body = "Dear Manager,"."\r\n"."\r\n";

	$body .= "Your subordinate has REQUEST FOR APPROVAL of her/his $_POST[LeaveName] application with details : "."\r\n";
	$body .= "Employee ID : ".$EmpData['p5_nip']."\r\n";
	$body .= "Name : ".$EmpData['p5_nama']."\r\n";
	$body .= "Leave Balances : ".$_POST['sisacuti']." Days\r\n";
	$body .= "Leave Taken : ".$TotalDay." Days (" .$Information." )\r\n"."\r\n";

	$body .= "Submissions detail : "."\r\n";
	$body .= "Request Date : ".$DateNow."\r\n";
	$body .= "Starting Date : ".$_POST['StartingDate']."\r\n";
	$body .= "End Date : ".$_POST['EndDate']."\r\n";
	$body .= "Reason : ".$_POST['Reason']."\r\n"."\r\n";

	$body .= "Status : New"."\r\n"."\r\n";
	$body .= "To Approve the submission, please click the link below  : ";
	$body .= "http://idjak01is07fs/avnet/approved_cuti.php?aksi=approved_manajer&nomor_cuti=$_POST[LeaveNumber]"."\r\n";

	$body .= "To reject the submission, please click the link below : ";
	$body .= "http://idjak01is07fs/avnet/approved_cuti.php?aksi=cancel_manajer&nomor_cuti=$_POST[LeaveNumber]"."\r\n";

	$body .= "\r\n"."Or login the system please click the link below : http://idjak01is07fs/avnet"."\r\n"."\r\n";

	$body .= "Regards, "."\r\n";
	$body .= "E-Leave Application System";
 
$host = "ssl://mail.fivepandava.com";
$port = "465";
$username = "leave@fivepandava.com";
$password = "N3wlif3v3ry600d";
 
$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
 'port' => $port,
 'auth' => true,
 'username' => $username,
 'password' => $password));
 
$mail = $smtp->send($to, $headers, $body);
 if (PEAR::isError($mail)) {
   $Message = "Email Can't be Send";
  } else {
   $Message = "Message successfully sent!";
  }
  echo $body;
//END SEND SEND MAIL
			// mysql_query("INSERT INTO tbl_leave_trans (p5_id, p5_emp_id, p5_name, p5_master_leave_id, p5_sl_id, p5_year, p5_date_request, 
							// p5_date_start, p5_date_end, p5_days, p5_address, p5_reason, p5_status, p5_progress, p5_keterangan, p5_year_balances, p5_approval) VALUES 
						// ('$_POST[LeaveNumber]', '$_POST[EmpId]', '-', '$_POST[LeaveId]', '0', '$Year', '$DateNow', 
						// '$_POST[StartingDate]', '$_POST[EndDate]', '$TotalDay', '$_POST[Address]', '$_POST[Reason]', '$_POST[LeaveStatus]', '0', '$Information', '$Year', 'yes')")or die(mysql_error());
			// header("Location:".ASSETS_BACKEND_DIR."?q=Leave/Leave/ResultLeave.php&id=$_POST[LeaveId]&Link=2");
			} else if ($_GET['LeaveDel'] == "hapus") {
				mysql_query("UPDATE tbl_leave_trans SET p5_progress=3 WHERE p5_id='$_GET[id]'");
				header("Location:".ASSETS_BACKEND_DIR."?q=Leave/Leave/ListLeave.php&id=$_GET[LeaveId]&Link=2");
			}
?>