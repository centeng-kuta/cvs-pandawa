<?php
db_connect();
if ($_POST['EmployeeInsert']) {
	// mysql_query("INSERT INTO tbl_emp_departement (p5_nama_departement) VALUES ('$_POST[DepartementName]')");
	//mysql_query("INSERT INTO tbl_emp_departement (p5_nama_departement) VALUES ('$_POST[DepartementName]')");
	//mysql_query("INSERT INTO tbl_emp_departement (p5_nama_departement) VALUES ('$_POST[DepartementName]')");
	//mysql_query("INSERT INTO tbl_emp_departement (p5_nama_departement) VALUES ('$_POST[DepartementName]')");
	// header("Location:ListDepartement.php");
	} else if ($_POST['EmployeeUpdate']) {
		// mysql_query("UPDATE tbl_emp_departement SET p5_nama_departement='$_POST[DepartementName]' WHERE p5_id='$_POST[id]'");	
		// header("Location:ListDepartement.php");
	} else if ($_GET['EmpDel'] == "hapus") {
			// mysql_query("DELETE FROM tbl_emp_departement WHERE p5_id='$_GET[id]'");
			// header("Location:ListDepartement.php");
		}
?>