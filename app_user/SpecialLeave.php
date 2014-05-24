<?php
db_connect();
$SL = fetchData("tbl_leave_master_sl","*","p5_id='$_GET[code]'");
$TotalDays = $SL['p5_days'];

echo json_encode(array('days' => $TotalDays));
?>