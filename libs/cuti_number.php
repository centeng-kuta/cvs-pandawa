<?php
	db_connect();
	$perintah = mysql_query("SELECT * FROM tbl_leave_trans ORDER BY p5_id DESC")or die(mysql_error());
	$nomor=mysql_num_rows($perintah);
	$tampil=mysql_fetch_array($perintah);
	if ($nomor==0) {
		$cuti_number= "LEA0000001";
	} else {
		$cuti_number=$tampil['p5_id'];
		$cuti_number=substr($cuti_number,3,7);
		$cuti_number= $cuti_number+ 10000001;
		$cuti_number=substr($cuti_number,1,7);
		$cuti_number="LEA".$cuti_number;
	}

?>