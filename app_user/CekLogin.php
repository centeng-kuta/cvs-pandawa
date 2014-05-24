<?php
	db_connect();
	session_start();
	$perintah=mysql_query("SELECT p5_id, p5_nip, p5_password From tbl_emp_employee 
							WHERE p5_nip='$_POST[nip]' 
							AND p5_password='$_POST[password]'")
				or die(mysql_error());
				
	$nomor = mysql_num_rows($perintah);
	if ($nomor>=1) {
		$tampil=mysql_fetch_array($perintah);
		$_SESSION['id'] = $tampil['p5_id'];
		$_SESSION['master'] = $tampil['p5_nip'];
		header("Location:".ASSETS_BACKEND_DIR."?q=dashboard/dashboard.php");
		exit();
	} else {
		?>
		<script type="text/javascript">
    	alert("<?php echo "Password Wrong..."; ?>");
    	history.back();
  </script>
  <?php
		//header ("location:index.html");
		exit;
	}
?>