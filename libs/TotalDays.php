<?php
db_connect();
$sum_total = 0;
if ($_GET['StartingDate'] != "" and $_GET['EndDate'] != "") {
$date1 = $_GET['StartingDate'];
$date2 = $_GET['EndDate'];

$pecahTgl1 = explode("-", $date1);
$tgl1 = $pecahTgl1[2];
$bln1 = $pecahTgl1[1];
$thn1 = $pecahTgl1[0];
// counter looping
$i = 0;
$j = 1;
// counter untuk jumlah hari minggu
$sum = 0;
do
{
   // mengenerate tanggal berikutnya
   $tanggal = date("Y-m-d", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
   // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
   if ((date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0) || (date("w", mktime(0, 0, 0, $bln1, $tgl1+$j, $thn1)) == 0))
   {
     $sum++;
   } 	 
   $i++;
   $j++;
}
while ($tanggal != $date2); 
$sum_total = $i-$sum;
} else {
	$i = 0;
	}
echo json_encode(array('total_days' => $sum_total));
?>