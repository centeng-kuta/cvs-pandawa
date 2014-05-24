<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
db_connect();
$DeptList = fetchData("tbl_emp_departement","*","p5_id=$_GET[id]");
?>
<form action="<?php echo form_action('MasterData/Departement/ActionDepartement.php'); ?>" method="post">
     <div class="workplace">          
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Departement Name Edit</h1>
                    </div>
                    <div class="block-fluid">                        
                        <input type="hidden" name="id" value="<?php echo $DeptList['p5_id']; ?>">
                        <div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><input type="text" value="<?php echo $DeptList['p5_nama_departement']; ?>" name="DepartementName" /></div>
                        </div>                                                                
                        
                    </div>
                </div>
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Departement/ListDepartement.php&Link=1"><button class="btn" type="button">Back</button></a> &nbsp;
				<button class="btn" id="btnSubmit" type="submit" name="DepartementUpdate" value="Submit" >Submit</button>
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>	
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>	