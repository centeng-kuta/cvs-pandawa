<?php 
require_once '../../../Menus.php';
//require realpath(__DIR__.'/../../').'/includes/common.php';
//include 'menuheader_attendance.php';
?>

<?php
$query_timetable = mysql_query("SELECT p5_id, p5_timetable_name FROM tbl_abs_timetable")or die(mysql_error());
$query_depts = mysql_query("SELECT p5_id, p5_nama_departement FROM tbl_emp_departement")or die(mysql_error());

$timetable = array();
$depts = array();

while ($rows = mysql_fetch_array($query_timetable, MYSQL_ASSOC)) {
	array_push($timetable, $rows);
}

array_push($timetable, array('p5_id' => 0, 'p5_timetable_name' => 'Libur'));

while ($rows = mysql_fetch_array($query_depts, MYSQL_ASSOC)) {
	array_push($depts, $rows);
}

function dropDownOpts($opts)
{
	$opts_str = "";
	foreach ($opts as $opt) {
		$opts_str .= "<option value=\"{$opt['p5_id']}\">{$opt['p5_timetable_name']}</option>\n";
	}

	return $opts_str;
}

function displayDateRangeInputSchedule($start_date, $end_date, $opts_str)
{
	$dr = generateDateRange($start_date, $end_date);

	$str = "
	<fieldset>
	<legend>Set schedule on date range</legend>
	<table width=\"100%\">\n\n";

	$c = 1;
	foreach ($dr as $date) {
		$color = "#DDDDDD";
		if ($c % 2 == 0) {
			$color = "#999999";
		}

		$str .= "
		<tr style=\"background-color:{$color};\">
		<td class=\"day_title\" style=\"width:100px;\"><span style=\"color:blue;\">{$date}</span></td>
		<td>
		<select name=\"Schedule[{$c}][timetable]\" class=\"timetable\">
		{$opts_str}
		</select>

		<input name=\"Schedule[{$c}][schedule_date]\" type=\"hidden\" value=\"{$date}\" />

		</td>
		</tr>\n\n";

		$c++;
	}
	        
	$str.= "
	</table>
	</fieldset>";

	return $str;
}

$timetable_opts = dropDownOpts($timetable);
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
                            <div class="span3">Start date</div>
                            <div class="span9"><input type="text" name="start_date" value="<?php echo $_GET['start_date']; ?>" id="DatepickerStart" /></div>
                        </div>
					
					<div class="row-form clearfix">
                            <div class="span3">End date</div>
                            <div class="span9"><input type="text" name="end_date" value="<?php echo $_GET['end_date']; ?>" id="DatepickerEnd" /></div>
                    </div> 	
					
					<div class="row-form clearfix">
                            <div class="span3">Department</div>
                            <div class="span9"><select name="depts" id="depts">
		    				<?php 
		    				foreach ($depts as $item) {
		    					if ($_GET['depts'] != $item['p5_id']) {
		    						echo "<option value=\"{$item['p5_id']}\">{$item['p5_nama_departement']}</option>";
		    					} else {
		    						echo "<option value=\"{$item['p5_id']}\" selected=\"selected\">{$item['p5_nama_departement']}</option>";
		    					}
		    					
		    				}
		    				?>
			    			</select></div>
                    </div> 
					
					<div class="row-form clearfix">
                            <div class="span3">Employee</div>
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

<?php if ($_GET['submit']): ?>
		<form class="assign-schedule" action="ex_assign_schedule.php" method="post">
			<input type="hidden" name="save_type" value="shift_by_dept" />
			<input type="hidden" name="depts" value="<?php echo $_GET['depts']; ?>" />
			<input type="hidden" name="emps" value="<?php echo $_GET['emps']; ?>" />

			<?php echo displayDateRangeInputSchedule($_GET['start_date'], $_GET['end_date'], $timetable_opts); ?>

			<input class="form-button" type="submit" title="Save schedule" value="Save Schedule" />
		</form>
	    <?php endif; ?>


