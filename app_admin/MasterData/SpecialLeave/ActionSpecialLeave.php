<?php
db_connect();
if ($_POST['SpecialLeaveUpdate']) {
	mysql_query("UPDATE tbl_leave_master_sl SET p5_sl='$_POST[SpecialLeaveName]', p5_days='$_POST[TotalDays]' WHERE p5_id='$_POST[id]'")or die(mysql_error());
	header("Location:".ASSETS_BACKEND_DIR."?q=MasterData/SpecialLeave/ResultSpecialLeave.php&Link=1&id=$_POST[id]");
	} else if ($_GET['SpecialLeaveDelete'] == "hapus") {
		mysql_query("DELETE FROM tbl_leave_master_sl WHERE p5_id='$_GET[id]'")or die(mysql_error());
		header("Location:".ASSETS_BACKEND_DIR."?q=MasterData/SpecialLeave/ListSpecialLeave.php&Link=1");
		} else if ($_POST['SpecialLeaveInsert']) {
			mysql_query("INSERT INTO tbl_leave_master_sl (p5_sl, p5_days) VALUES
														  ('$_POST[SpecialLeaveName]','$_POST[TotalDays]')")or die(mysql_error());
			header("Location:".ASSETS_BACKEND_DIR."?q=MasterData/SpecialLeave/ResultSpecialLeave.php&Link=1");
			}
?>			