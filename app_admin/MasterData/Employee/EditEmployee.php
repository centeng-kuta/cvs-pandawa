<?php 
require_once '../../Menus.php'; 
$DeptList = fetchData("tbl_emp_departement","*","p5_id=$_GET[id]");
?>
<form action="ActionDepartement.php" method="post">
     <div class="workplace">          
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Departement Name</h1>
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
				<a href="<?php echo $BaseUrl; ?>4dmin/MasterData/Departement/ListDepartement.php"><button class="btn" type="button">Back...</button></a> &nbsp;
				<input class="btn" type="submit" name="DepartementUpdate" value="Submit...">
				</p>
            <div class="dr"><span></span></div>
        </div>
</form>		