<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
?>
<form id="validation" action="<?php echo form_action('MasterData/Departement/ActionDepartement.php'); ?>" method="post"> 
     
            <div class="row-fluid">           
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Departement Add</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Departement Name</div>
                            <div class="span9"><input type="text" name="DepartementName" class="validate[required] datepick" /></div>
                        </div>                                                                
                        
                    </div>
                </div>          
            </div>
            <p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/Departement/ListDepartement.php&Link=1"><button class="btn" type="button">Back</button></a> &nbsp;
				<button class="btn" id="btnSubmit" type="submit" name="DepartementInsert" value="Submit" >Submit</button>
				</p>
            <div class="dr"><span></span></div>
        
</form> 
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>