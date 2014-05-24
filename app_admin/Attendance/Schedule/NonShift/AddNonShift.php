<?php 
require_once '../../../Menus.php';
//require realpath(__DIR__.'/../../').'/includes/common.php';
//include 'menuheader_attendance.php';
?>

<?php
//require_once base_path().'4dmin/conn.php';

$days = array(
	1 => "Senin",
	2 => "Selasa",
	3 => "Rabu",
	4 => "Kamis",
	5 => "Jumat",
	6 => "Sabtu",
	7 => "Minggu"
);

$query_timetable = mysql_query("SELECT p5_id, p5_timetable_name FROM tbl_abs_timetable");
$query_depts = mysql_query("SELECT p5_id, p5_nama_departement FROM tbl_emp_departement");

$timetable = array();
$depts = array();

while ($rows = mysql_fetch_array($query_timetable, MYSQL_ASSOC)) {
	array_push($timetable, $rows);
}

array_push($timetable, array('p5_id' => 0, 'p5_timetable_name' => 'Libur'));

while ($rows = mysql_fetch_array($query_depts, MYSQL_ASSOC)) {
	array_push($depts, $rows);
}
?>
<form id="validation" action="ActionDepartement.php" method="post"> 
     <div class="workplace">
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Assign Schedule Non-Shift</h1>
                    </div>
                    <div class="block-fluid">                        
                        <?php foreach ($days as $dayK => $dayV): ?>
                        <div class="row-form clearfix">
                            <div class="span3"><?php echo $dayV; ?></div>
                            <div class="span9"><select name="timetable[<?php echo $dayK; ?>]">
		    				<?php foreach ($timetable as $item): ?>
		    				<option value="<?php echo $item['p5_id']; ?>"><?php echo $item['p5_timetable_name']; ?></option>
		    			    <?php endforeach; ?>
			    			</select></div>
                        </div>                                                                
                        <?php endforeach; ?>
                    
					<div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><select name="depts" id="depts">
		    				<?php foreach ($depts as $item): ?>
		    				<option value="<?php echo $item['p5_id']; ?>"><?php echo $item['p5_nama_departement']; ?></option>
		    			    <?php endforeach; ?>
			    			</select></div>
                        </div>
					
					<div class="row-form clearfix">
                            <div class="span3">Employee Name</div>
                            <div class="span9"><select name="emps" id="emps">
			    				<option value="">-- ALL --</option>
			    			</select></div>
                    </div> 	
					</div> 
                </div>          
            </div>
            <p align="center">
				<a href="<?php echo $BaseUrl; ?>4dmin/Attendance/EmployeeSchedule/NonShift/ListNonShift.php?Link=3"><button class="btn" type="button">Back</button></a> &nbsp;
				<button class="btn" id="btnSubmit" type="submit" name="DepartementInsert" value="Submit" >Submit...</button>
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>


