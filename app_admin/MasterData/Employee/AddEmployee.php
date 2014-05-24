<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?>
<form id="validation" action="ActionEmployee.php" method="post"> 
     <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Personal Data</h1>
                    </div>
                    <div class="block-fluid">                        
                        
						<div class="row-form clearfix">
                            <div class="span3">Attendance ID	</div>
                            <div class="span9"><input type="text" name="AttendanceID" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Employee ID	</div>
                            <div class="span9"><input type="text" name="EmpID" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Password</div>
                            <div class="span9"><input type="text" name="Password"/></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Employee Name</div>
                            <div class="span9"><input type="text" name="EmpName" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Nick Name</div>
                            <div class="span9"><input type="text" name="NickName" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Job Title	</div>
                            <div class="span9"><input type="text" name="JobTitle" /></div>
                        </div>
						
                        <div class="row-form clearfix">
                            <div class="span3">Department Name</div>
                            <div class="span9">
                                <select name="DepartementName">
									<option value="">Choose a Department Name</option>
									<?php
									 $divisi = fetchDataAll ("tbl_emp_departement","*"); 
									 foreach ($divisi as $div) {
									?>
									<option value="<?php echo $div['p5_id']; ?>"><?php echo $div['p5_nama_departement']; ?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>        
                        
						<div class="row-form clearfix">
                            <div class="span3">Leave Approval by	</div>
                            <div class="span9"><input type="text" name="LeaveApproval" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Place of Birth	</div>
                            <div class="span9"><input type="text" name="PlaceBirth" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Date of Birth	</div>
                            <div class="span9"><input type="text" name="DateBirth" id="DatepickerOfBirth" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Current Address ( if not the same with KTP ) </div>
                            <div class="span9"><textarea name="CurrentAddress"></textarea></div>
                        </div>

						<div class="row-form clearfix">
                            <div class="span3">Permanent Address ( As State in KTP ) </div>
                            <div class="span9"><textarea name="PermanetAddress"></textarea></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Citizen ID / No. KTP</div>
                            <div class="span9"><input type="text" name="CitizenID" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Phone ( Home )</div>
                            <div class="span9"><input type="text" name="Phone" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Handphone</div>
                            <div class="span9"><input type="text" name="Handphone" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Gender</div>
                            <div class="span9">
                                <select name="Gender">
									<option value="">Choose a Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
                            </div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Employee Status</div>
                            <div class="span9">
                                <select name="EmployeeStatus">
									<option value="">Choose a Status</option>
									<option value="Permanent">Permanent</option>
									<option value="Temporary">Temporary</option>
									<option value="Outsourcing">Outsourcing</option>
								</select>
                            </div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Join Date</div>
                            <div class="span9"><input type="text" name="JoinDate" id="DatepickerJoinDate" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Start Of Contract</div>
                            <div class="span9"><input type="text" name="StartContract" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">End Of Contract</div>
                            <div class="span9"><input type="text" name="EndContract" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Bank Name</div>
                            <div class="span9"><input type="text" name="BankName" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Account Bank Number</div>
                            <div class="span9"><input type="text" name="AccountBank" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Martial Status</div>
                            <div class="span9">
                                <select name="MartialStatus">
									<option value="">Choose a Status</option>
									<option value="Married">Married</option>
									<option value="NotMarried">Not Married</option>
									<option value="BeenMarried">Been Married</option>
								</select>
                            </div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Number of Child</div>
                            <div class="span9"><input type="text" name="NumberChild" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Religion</div>
                            <div class="span9">
                                <select name="Religion">
									<option value="">Choose a Religion</option>
									<option value="Moslem">Moslem</option>
									<option value="Christian">Christian</option>
									<option value="Chatolic">Chatolic</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
									<option value="Konh Hu Chu">Kong Hu Chu</option>
								</select>
                            </div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">Blood</div>
                            <div class="span9"><input type="text" name="Blood" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Number NPWP</div>
                            <div class="span9"><input type="text" name="NumberNpwp" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Pasport Number</div>
                            <div class="span9"><input type="text" name="" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Expired Pasport</div>
                            <div class="span9"><input type="text" name="ExpiredPasport" id="DatepickerExpiredPasport" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Office Email</div>
                            <div class="span9"><input type="text" name="OfficeEmail" class="validate[required]"/></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Other Email</div>
                            <div class="span9"><input type="text" name="OtherEmail" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Information</div>
                            <div class="span9"><textarea name="Information"></textarea></div>
                        </div>
						
						 <div class="row-form clearfix">
                            <div class="span3">Image</div>
                            <div class="span9">                                                                
                                <input type="file" name="File"/>
                            </div>
                        </div> 
                        
                        
                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-target"></div>
                        <h1>Family Data</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Father</div>
                            <div class="span9"><input type="text" name="Father" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" name="DateBirthFather" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Mother</div>
                            <div class="span9"><input type="text" name="Mother" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" name="DateBirthMother" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Spouse Name</div>
                            <div class="span9"><input type="text" name="SpouseName" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" name="DateBirthSpouse" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Name ( First Child )</div>
                            <div class="span9"><input type="text" name="NameFirstChild" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Gender</div>
                            <div class="span9">
                                <select name="GenderFirstChild">
									<option value="">Choose a Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
                            </div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" name="DateBirthFristChild" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Name (Second Child)</div>
                            <div class="span9"><input type="text" name="NameSecondChild" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Gender</div>
                            <div class="span9">
                                <select name="GenderSecondChild">
									<option value="">Choose a Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
                            </div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" name="DateBirthSecondChild" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Name (Third Child)</div>
                            <div class="span9"><input type="text" name="NameThirdChild" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Gender</div>
                            <div class="span9">
                                <select name="GenderThirdChild">
									<option value="">Choose a Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
                            </div>
                        </div>
						
			 <div class="row-form clearfix">
                            <div class="span3">Date of Birth</div>
                            <div class="span9"><input type="text" name="DateBirthThirdChild" /></div>
                        </div>
						
			<div class="row-form clearfix">
                            <div class="span3">Name Relation</div>
                            <div class="span9"><input type="text" name="NameRelation" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Relation</div>
                            <div class="span9"><input type="text" name="Relation" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Phone / HP</div>
                            <div class="span9"><input type="text" name="Phone" class="validate[required]" /></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3">Address</div>
                            <div class="span9"><textarea name="Address"></textarea></div>
                        </div>
						
                    </div>
                </div>                
                
            </div>
            
            <div class="dr"><span></span></div>            
            
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Education Data</h1>
                    </div>
                    <div class="block-fluid">                        
						<div class="row-form clearfix">
                            <div class="span3">Elementary School</div>
                            <div class="span9"><input type="text" name="ElmSchool" class="validate[required]" /></div>
                        </div>
			 
						<div class="row-form clearfix">
                            <div class="span3">Graduate Elementary</div>
                            <div class="span9"><input type="text" name="GrdElementary" class="validate[required]" /></div>
                        </div>
			 
						<div class="row-form clearfix">
                            <div class="span3">Junior School</div>
                            <div class="span9"><input type="text" name="JnrSchool" class="validate[required]" /></div>
                        </div>
			 
						<div class="row-form clearfix">
                            <div class="span3"> Graduate Junior</div>
                            <div class="span9"><input type="text" name="GrdJunior" class="validate[required]" /></div>
                        </div>			 

						<div class="row-form clearfix">
                            <div class="span3">Senior School</div>
                            <div class="span9"><input type="text" name="SnrSchool" class="validate[required]" /></div>
                        </div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Graduate Senior</div>
                            <div class="span9"><input type="text" name="GrdSenior"class="validate[required]" /></div>
                        </div>
			 
						<div class="row-form clearfix">
                            <div class="span3">Diploma</div>
                            <div class="span9"><input type="text" name="Diploma" /></div>
                        </div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Graduate Diploma</div>
                            <div class="span9"><input type="text" name="GrdDiploma" /></div>
                        </div>
			 			 
						<div class="row-form clearfix">
                            <div class="span3">Bachelor</div>
                            <div class="span9"><input type="text" name="Bachelor" /></div>
                        </div>
			 			 
						<div class="row-form clearfix">
                            <div class="span3">Master</div>
                            <div class="span9"><input type="text" name="Master" /></div>
                        </div>

						<div class="row-form clearfix">
                            <div class="span3">Graduate Master</div>
                            <div class="span9"><input type="text" name="GrdMaster" /></div>
                        </div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Doctoral</div>
                            <div class="span9"><input type="text" name="Doctoral" /></div>
                        </div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Graduate Doctoral</div>
                            <div class="span9"><input type="text" name="GrdDoctoral" /></div>
                        </div>
                    </div>
                </div>
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-ok"></div>
                        <h1>Working History</h1>
                    </div>
                    <div class="block-fluid">                        
						<div class="row-form clearfix">
                            <div class="span3">Company Name (First)</div>
                            <div class="span9"><input type="text" name="CompanyNameFirst" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"><input type="text" name="JobTitleFirst" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3">City</div>
                            <div class="span9"><input type="text" name="CityFirst" /></div>
						</div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Working Periode</div>
                            <div class="span9"><input type="text" name="WorkingPeriodeFirst1" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3"></div>
                            <div class="span9"><input type="text" name="WorkingPeriodeFirst2" /></div>
						</div>
						
						<div class="row-form clearfix">
                            <div class="span3">Company Name (Second)</div>
                            <div class="span9"><input type="text" name="CompanyNameSecond" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"><input type="text" name="JobTitleSecond" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3">City</div>
                            <div class="span9"><input type="text" name="CitySecond" /></div>
						</div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Working Periode</div>
                            <div class="span9"><input type="text" name="WorkingPeriodeSecond1" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3"></div>
                            <div class="span9"><input type="text" name="WorkingPeriodeSecond2" /></div>
						</div>
						
						<div class="row-form clearfix">
                            <div class="span3">Company Name (Third)</div>
                            <div class="span9"><input type="text" name="CompanyNameThird" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3">Job Title</div>
                            <div class="span9"><input type="text" name="JobTitleThird" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3">City</div>
                            <div class="span9"><input type="text" name="CityThird" /></div>
						</div>			 
			 
						<div class="row-form clearfix">
                            <div class="span3">Working Periode</div>
                            <div class="span9"><input type="text" name="WorkingPeriodeThird1" /></div>
						</div>
			 
						<div class="row-form clearfix">
                            <div class="span3"></div>
                            <div class="span9"><input type="text" name="WorkingPeriodeThird2" /></div>
						</div>
						                         
                    </div>                                
                </div>
                                
            </div>
                       
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Employee/ActionEmployee.php&Link=1"><button class="btn" type="button">Back</button></a> &nbsp;
				<button class="btn" id="btnSubmit" type="submit" name="EmployeeInsert" value="Submit" >Submit</button>
				</p>
            <div class="dr"><span></span></div>
        
        </div>
</form>  
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>