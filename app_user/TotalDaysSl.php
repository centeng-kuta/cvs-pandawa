<?php
db_connect();
// alert ($_GET['startDate']);
$_GET['startDate'];
$_GET['totalDays'];

//$sum_total = 0;
// if ($_GET['TotalDays'] == 1) {
	// $date1 = $_GET['StartDate'];
	// $Date2Fix = $_POST['StartDate'];
	// } else {
// $lama_cuti = $_GET['totalDays'] - 1;
// $date1 = $_GET['startDate'];
$EndDate = mysql_query("SELECT ADDDATE('$_GET[startDate]', '$_GET[totalDays]') as NextDate")or die(mysql_error());
$ed = mysql_fetch_array($EndDate);
// $date2 = $ed['NextDate'];

// $pecahTgl1 = explode("-", $date1);
// $tgl1 = $pecahTgl1[2];
// $bln1 = $pecahTgl1[1];
// $thn1 = $pecahTgl1[0];
// // counter looping
// $i = 0;
// $j = 1;
// // counter untuk jumlah hari minggu
// $sum = 0;
// do
// {
   // // mengenerate tanggal berikutnya
   // $tanggal = date("Y-m-d", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
   // // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
   // if ((date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0) || (date("w", mktime(0, 0, 0, $bln1, $tgl1+$j, $thn1)) == 0))
   // {
     // $sum++;
   // } 	 
   // $i++;
   // $j++;
// }
// while ($tanggal != $date2); 
// $sum_total = $sum;
// $EndDate1 = mysql_query("SELECT ADDDATE('$date2', '$sum_total') as NextDate")or die(mysql_error());
// $ed1 = mysql_fetch_array($EndDate1);
// $date2 = $ed1['NextDate'];

// $CekPh = mysql_query ("Select * From tbl_pengajuan_cuti Where clcdo='ph' and p5_awal_cuti between '$date1' and '$date2'");
// $cp = mysql_fetch_array($CekPh);
// $ph = $cp['p5_jmlh_hari'];

// $EndDate2 = mysql_query("SELECT ADDDATE('$date2', '$ph') as NextDate")or die(mysql_error());
// $ed2 = mysql_fetch_array($EndDate2);
// $Date2Fix = $ed2['NextDate'];
	// }
echo json_encode(array('end_date' => $ed['NextDate']));
?>