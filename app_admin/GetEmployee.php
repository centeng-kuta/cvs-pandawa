<?php
include '../libs/conn.php';
$karyawan = query("SELECT p5_id,p5_nip,p5_id_absensi,p5_nama FROM tbl_emp_employee")or die(mysql_error());
foreach ($karyawan as $k) {
  echo $k['p5_id']." - ".$k['p5_nip']." - ".$k['p5_id_absensi']." - ".$k['p5_nama']."\n";
}
?>