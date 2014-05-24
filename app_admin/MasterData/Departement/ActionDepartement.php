<?php
db_connect();

if ($_POST['DepartementInsert']) {
	mysql_query("INSERT INTO tbl_emp_departement (p5_nama_departement) VALUES ('$_POST[DepartementName]')") or die(mysql_error());
	redirect("MasterData/Departement/ResultDepartement.php&Link=1&dep_name=$_POST[DepartementName]");

} else if ($_POST['DepartementUpdate']) {
	mysql_query("UPDATE tbl_emp_departement SET p5_nama_departement='$_POST[DepartementName]' WHERE p5_id='$_POST[id]'");	
	redirect("MasterData/Departement/ResultDepartement.php&Link=1&dep_name=$_POST[DepartementName]");

} else if ($_GET['DeptDel'] == "hapus") {
	mysql_query("DELETE FROM tbl_emp_departement WHERE p5_id='$_GET[id]'");
	redirect("MasterData/Departement/ListDepartement.php&Link=1");
}