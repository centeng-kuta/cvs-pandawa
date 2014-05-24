<?php 
db_connect();
//START Attendace Management
function generateDateRange($startdate,$enddate) {
    $listOfDate = array();
	array_push($listOfDate,$startdate);
	$c = 1;
	while (true) {
	    $date = strtotime(date("Y-m-d",strtotime($startdate))."+".$c." day");
		$str_date = date("Y-m-d",$date);
		
		if ($str_date !== $enddate) {
		    array_push($listOfDate,$str_date);
		} else {
		    array_push($listOfDate,$enddate);
			break;
		}
		$c++;
	}
	return $listOfDate;
}
?> 
 <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Daily Report For Employee</h1>      
                        <ul class="buttons">
                            <li><a href="#" class="isw-download"></a></li>                                                        
                            <li><a href="#" class="isw-attachment"></a></li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                            <thead>
                                <tr>                        
									<th width="7%">Emp.Id</th>
									<th width="7%">Emp.Name</th>
									<th width="7%">Job Title</th>
                                    <th width="7%">Date</th>
                                    <th width="7%">Day</th>
                                    <th width="10%">Working Time</th>
                                    <th width="4%">In</th>
									<th width="4%">Out</th>
									<th width="4%">Status</th>
									<th width="8%">Work Time</th>
									<th width="5%">Late</th>
									<th width="5%">Early</th>
									<th width="10%">OTOD X 1,5</th>
									<th width="10%">OT.OD X 2</th>
									<th width="10%">OT.H X 2</th>
									<th width="10%">OT.H X 3</th>
									<th width="10%">OT.H X 4</th>
									<th width="10%">OT</th>
                                </tr>
                            </thead>
                            <tbody>
<?php  
$DataKaryawan = mysql_query("SELECT EMp.p5_nip, Emp.p5_nama, Emp.p5_jabatan, Emp.p5_id_absensi, Dept.p5_nama_departement 
								 FROM tbl_emp_employee AS EMp 
								 LEFT JOIN tbl_emp_departement AS Dept ON Emp.p5_departement_id = Dept.p5_id
								 WHERE $Condition")or die(mysql_error());
	 while($DtKary = mysql_fetch_array($DataKaryawan)) {
$AbsensiId = $DtKary['p5_id_absensi'];	 
$from = $_POST['StartingDate'];
$to = $_POST['EndDate'];
$collectionsOfDate = generateDateRange($from,$to);
$data = array();
for ($x=0; $x<count($collectionsOfDate); $x++) {
	$data[$collectionsOfDate[$x]] = array(
		'JamMasuk' => null,
		'JamPulang' => null,
		'BatasAwalMasuk' => null,
		'BatasAkhirMasuk' => null,
		'BatasAwalKeluar' => null,
		'BatasAkhirKeluar' => null,
		'StartLate' => null,
		'StartEarly' => null,
		'StartOtNoon' => null,
		'StartOtCome' => null,
		'EndOtCome' => null
	);
}



//END LIST DATE
//ABSEN MASUK
$ActualIn = mysql_query ("SELECT 
dinosaurus.p5_date
,dinosaurus.p5_timetable_id
,DATE_FORMAT(dinosaurus.p5_in,'%H:%i') as p5_in
,DATE_FORMAT(dinosaurus.p5_out,'%H:%i') AS p5_out
,dinosaurus.StartIn
,dinosaurus.EndIn
,dinosaurus.StartOut
,dinosaurus.EndOut
,IF(t_checktime.p5_checktime >= TIMESTAMP(dinosaurus.StartIn) AND t_checktime.p5_checktime <= TIMESTAMP(dinosaurus.EndIn), TIME(t_checktime.p5_checktime), 'NULL') AS ActualIn
,IF(t_checktime.p5_checktime >= TIMESTAMP(dinosaurus.StartOut) AND t_checktime.p5_checktime <= TIMESTAMP(dinosaurus.EndOut), TIME(t_checktime.p5_checktime), 'NULL') AS ActualOut
,t_checktime.p5_checktime
,dinosaurus.p5_cycle_start
,dinosaurus.p5_cycle_end
,dinosaurus.p5_timetable_id
,dinosaurus.StartLate
,dinosaurus.StartEarly
,dinosaurus.StartOtNoon
,dinosaurus.StartOtCome
,dinosaurus.EndOtCome
FROM (
	SELECT 
	'IN' as x,
	t_shift.p5_date
	,t_shift.p5_abs_id
	,t_tmtbl.p5_in
	,t_tmtbl.p5_out
	,t_tmtbl.p5_cycle_start
	,t_tmtbl.p5_cycle_end 
	,t_shift.p5_timetable_id
	
	,DATE_ADD(CONCAT(t_shift.p5_Date,' ',t_tmtbl.p5_in), INTERVAL 't_tmtbl.p5_late' MINUTE) AS StartLate
	
	,DATE_ADD(CONCAT(t_shift.p5_Date,' ',t_tmtbl.p5_out), INTERVAL 't_tmtbl.p5_early' MINUTE) AS StartEarly
	
	,IF(t_tmtbl.p5_cycle_start = 1 and t_tmtbl.p5_cycle_end = 1, CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_out),
	 IF(t_tmtbl.p5_cycle_start = 1 and t_tmtbl.p5_cycle_end = 2, DATE_ADD(CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_out), INTERVAL t_tmtbl.p5_start_ot_return MINUTE),
	 IF(t_tmtbl.p5_cycle_start = 2 and t_tmtbl.p5_cycle_end = 1, DATE_ADD(CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_out), INTERVAL t_tmtbl.p5_start_ot_return+1440 MINUTE), ''))) AS StartOtNoon
	
	,CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_start_ot_come) AS StartOtCome
	
	,IF(t_tmtbl.p5_cycle_start = 1 and t_tmtbl.p5_cycle_end = 1, CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_end_ot_come),
	 IF(t_tmtbl.p5_cycle_start = 1 and t_tmtbl.p5_cycle_end = 2, CONCAT(DATE_ADD(t_shift.p5_date, INTERVAL 1 DAY),' ',t_tmtbl.p5_end_ot_come),
	 IF(t_tmtbl.p5_cycle_start = 2 and t_tmtbl.p5_cycle_end = 1, CONCAT(DATE_ADD(t_shift.p5_date, INTERVAL 1 DAY),' ',t_tmtbl.p5_end_ot_come), ''))) AS EndOtCome
	
	,CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_start_in) AS StartIn
	
	,IF(t_tmtbl.p5_cycle_start = 1 ,CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_end_in), CONCAT(DATE_ADD(t_shift.p5_date, INTERVAL 1 DAY),' ',t_tmtbl.p5_end_in)) AS EndIn
	
	,IF(t_tmtbl.p5_cycle_start = 1 ,CONCAT(t_shift.p5_date,' ',t_tmtbl.p5_start_out), CONCAT(DATE_ADD(t_shift.p5_date, INTERVAL 1 DAY),' ',t_tmtbl.p5_start_out)) AS StartOut
	
	,IF(t_tmtbl.p5_cycle_start = 1 and t_tmtbl.p5_cycle_end = 1, CONCAT(t_shift.p5_Date,' ',t_tmtbl.p5_end_out),
	 IF(t_tmtbl.p5_cycle_start = 1 and t_tmtbl.p5_cycle_end = 2, CONCAT(DATE_ADD(t_shift.p5_date, INTERVAL 1 DAY),' ',t_tmtbl.p5_end_out),
	 IF(t_tmtbl.p5_cycle_start = 2 and t_tmtbl.p5_cycle_end = 1, CONCAT(DATE_ADD(t_shift.p5_date, INTERVAL 1 DAY),' ',t_tmtbl.p5_end_out), ''))) AS EndOut


	FROM tbl_abs_shift t_shift

	LEFT OUTER JOIN tbl_abs_timetable t_tmtbl ON t_shift.p5_timetable_id = t_tmtbl.p5_id

	WHERE t_shift.p5_abs_id = '$AbsensiId'
) dinosaurus 

LEFT OUTER JOIN tbl_abs_checktime_temp t_checktime ON DATE(dinosaurus.p5_date) = DATE(t_checktime.p5_checktime) 
WHERE DATE(dinosaurus.p5_date) BETWEEN '{$from}' AND '{$to}'
ORDER BY dinosaurus.p5_date, t_checktime.p5_checktime");


   while($am = mysql_fetch_array($ActualIn, MYSQL_ASSOC)) {
	   $data[$am['p5_date']]['JamMasuk'] = $am['p5_in'];
   	   $data[$am['p5_date']]['JamPulang'] = $am['p5_out'];
	   $data[$am['p5_date']]['BatasAwalMasuk'] = $am['StartIn'];
   	   $data[$am['p5_date']]['BatasAkhirMasuk'] = $am['EndIn'];
	   $data[$am['p5_date']]['BatasAwalKeluar'] = $am['StartOut'];
	   $data[$am['p5_date']]['BatasAkhirKeluar'] = $am['EndOut'];
	   $data[$am['p5_date']]['StartLate'] = $am['StartLate'];
	   $data[$am['p5_date']]['StartEarly'] = $am['StartEarly'];
	   $data[$am['p5_date']]['StartOtNoon'] = $am['StartOtNoon'];
	   $data[$am['p5_date']]['StartOtCome'] = $am['StartOtCome'];
	   $data[$am['p5_date']]['EndOtCome'] = $am['EndOtCome'];
   }
foreach ($data as $itemKey => $itemVal) {
$JamKerjaMasuk = $itemVal['JamMasuk'];
$JamKerjaPulang = $itemVal['JamPulang'];
$StartIn = $itemVal['BatasAwalMasuk'];
$EndIn = $itemVal['BatasAkhirMasuk'];
$StartOut = $itemVal['BatasAwalKeluar'];
$EndOut = $itemVal['BatasAkhirKeluar'];

//ACTUAL IN		
$TransActualIn = mysql_query("SELECT (DATE_FORMAT(p5_checktime,'%H:%i')) AS CheckIn, MIN(p5_checktime) AS CheckInTime
							FROM tbl_abs_checktime_temp AS t_checktime 
							WHERE t_checktime.p5_checktime >= '$StartIn' AND t_checktime.p5_checktime <= '$EndIn'
							AND DATE(t_checktime.p5_checktime) >= '$from' AND DATE(t_checktime.p5_checktime) <= '$to'")or die(mysql_error());  
$TransActIn = mysql_fetch_array($TransActualIn);
//ACTUAL OUT
$TransActualOut = mysql_query("SELECT MAX(DATE_FORMAT(p5_checktime,'%H:%i')) AS CheckOut, MAX(p5_checktime) AS CheckOutTime
							FROM tbl_abs_checktime_temp AS t_checktime 
							WHERE t_checktime.p5_checktime >= '$StartOut' AND t_checktime.p5_checktime <= '$EndOut'
							AND DATE(t_checktime.p5_checktime) >= '$from' AND DATE(t_checktime.p5_checktime) <= '$to'")or die(mysql_error());  
$TransActOut = mysql_fetch_array($TransActualOut, MYSQL_ASSOC);

//DAYS NAME, LATE, EARLY, OVERTIME & WORKTIME
$TransActAtt = mysql_query("SELECT DAYNAME('$itemKey') AS DaysName
						   ,TIMEDIFF('$TransActOut[CheckOutTime]','$TransActIn[CheckInTime]') AS WorkTime
						   
						   ,IF('$TransActIn[CheckInTime]' > '$itemVal[StartLate]', DATE_FORMAT(TIMEDIFF('$TransActIn[CheckInTime]','$itemVal[StartLate]'),'%H:%i'),'') AS Late
						   
						   ,IF('$TransActOut[CheckOutTime]' < '$itemVal[StartEarly]', DATE_FORMAT(TIMEDIFF('$itemVal[StartEarly]','$TransActOut[CheckOutTime]'),'%H:%i'),'') AS Early
						   
						   ,IF('$TransActOut[CheckOutTime]' > '$itemVal[StartOtNoon]', DATE_FORMAT(TIMEDIFF('$TransActOut[CheckOutTime]','$itemVal[StartOtNoon]'),'%H:%i'),'') AS OvertimeNoon
						   
						   ,IF ('$TransActIn[CheckInTime]' < '$itemVal[StartOtCome]', 'Yes','No') AS OvertimeCome")or die(mysql_error());
$TransAct = mysql_fetch_array($TransActAtt);

//OVERTIME 
$OTOD15 = "";
$OTOD20 = "";
$OTH2 = "";
$OTH3 = "";
$OTH4 = "";
$TransActOvertime = mysql_query("SELECT
HOUR('$TransAct[OvertimeNoon]') AS Jam, MINUTE('$TransAct[OvertimeNoon]') AS Menit")or die(mysql_error());
$TransActOt = mysql_fetch_array($TransActOvertime);

if ($TransActOt['Menit'] > 45) {
	$OT = 1;
	} else {
		$OT = 0;
		}
$OTSum = $TransActOt['Jam'] + $OT;
if ($OTSum >= 1 and $LeaveStatus == "") {
	$OTOD15 = 1;
	}  
if ($OTSum >= 2 and $LeaveStatus == "") {
	$OTOD20 = $OTSum - 1;
	}
if ($OTSum >= 1 and $OTSum <= 7 and $LeaveStatus != "") {
	$OTH2 = $OTSum;
	}	
if ($OTSum >= 8 and $LeaveStatus != "") {
	$OTH2 = 7;
	$OTH3 = 1;
	}
if ($OTSum >= 9 and $LeaveStatus != "") {
	$OTH2 = 7;
	$OTH3 = 1;
	$OTH4 = $OTSum - 8;
	}	
//LEAVE APPLICATION
$LeaveStatus = "";
$LeaveApplication = mysql_query("SELECT Lt.p5_date_start, Lt.p5_master_leave_id, Lm.p5_alias
						 FROM tbl_leave_trans AS Lt 
						 LEFT JOIN tbl_leave_master AS Lm ON Lt.p5_master_leave_id = Lm.p5_id
						 WHERE Lt.p5_emp_id='$EmployeeId' 
						 AND Lt.p5_progress=2 
						 AND '{$itemKey}' BETWEEN Lt.p5_date_start AND Lt.p5_date_end")or die(mysql_error());
$La = mysql_fetch_array($LeaveApplication);
			if ($La['p5_master_leave_id'] != 0) {
				$LeaveStatus = $La['p5_alias'];
				} 
				if ($La['p5_master_leave_id'] == "0") {
					$LeaveStatus = "SL";
					} 
				
//ATTENDANCE STATUS
if ($JamKerjaMasuk != "" and $JamKerjaPulang != "" and $TransActIn['CheckIn'] == "" and $TransActOut['CheckOut'] == "" and $LeaveStatus == "") {
	$StatusAbsen = "A";
		} else if ($LeaveStatus != "") {
			$StatusAbsen = $LeaveStatus;
			} else if ($JamKerjaMasuk == "" and $JamKerjaPulang == "") {
				$StatusAbsen = "OFF";
				} else if($JamKerjaMasuk != "" and $JamKerjaPulang != "" and $TransActIn['CheckIn'] == "" or $TransActOut['CheckOut'] == "") {
					$StatusAbsen = "Not I/O";
					} else {
						$StatusAbsen = "";
						}		
   ?>							
                                <tr>                                    
                                    <td nowrap="nowrap"><?php echo $DtKary['p5_nip']; ?></td>
									<td nowrap="nowrap"><?php echo $DtKary['p5_nama']; ?></td>
									<td nowrap="nowrap"><?php echo $DtKary['p5_jabatan']; ?></td>
									<td nowrap="nowrap"><?php echo $itemKey; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['DaysName']; ?></td>
									<td><?php echo $JamKerjaMasuk; ?> / <?php echo $JamKerjaPulang; ?></td>
									<td nowrap="nowrap"><?php echo $TransActIn['CheckIn']; ?></td>
									<td nowrap="nowrap"><?php echo $TransActOut['CheckOut']; ?></td>
									<td nowrap="nowrap"><?php echo $StatusAbsen; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['WorkTime']; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['Late']; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['Early']; ?></td>
									<td><?php echo $OTOD15; ?></td>
									<td nowrap="nowrap"><?php echo $OTOD20; ?></td>
									<td nowrap="nowrap"><?php echo $OTH2; ?></td>
									<td nowrap="nowrap"><?php echo $OTH3; ?></td>
									<td nowrap="nowrap"><?php echo $OTH4; ?></td>
									<td nowrap="nowrap"><?php echo $TransAct['OvertimeNoon']; ?></td>
                                </tr>  
<?php } } ?>								
                            </tbody>
                        </table>
                    </div>
                </div>                                 
            </div>    
			<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=Manager/Reports/Attendance/ListReportAtt.php&Link=4"><button class="btn" type="button">Back...</button></a>
			</p>
            <div class="dr"><span></span></div>            
        </div>
    </div>   