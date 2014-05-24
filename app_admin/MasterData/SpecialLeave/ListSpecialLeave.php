<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
 ?>
        
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>List Special Leave</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th width="60%">Special Leave Name</th>
                                    <th width="30%">Days</th>   
									<th width="10%">&nbsp;</th>  
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$SpecialLeave = fetchDataAll("tbl_leave_master_sl","*");
								foreach ($SpecialLeave as $SL) {
							?>
                                <tr>
                                    <td><a href="#"><?php echo $SL['p5_sl']; ?></a></td>
                                    <td><?php echo $SL['p5_days']; ?></td> 
									<td><a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/EditSpecialLeave.php&id=<?php echo $SL['p5_id']; ?>&Link=1"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_edit.png" width="20%" title="Edit this File"></a> &nbsp; 
									<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/ActionSpecialLeave.php&SpecialLeaveDelete=hapus&id=<?php echo $SL['p5_id']; ?>" onClick="return konfirmasi();"><img src="<?php echo ASSETS_BACKEND_URL; ?>img/icons/bb/ic_cancel.png" width="20%" title="Delete this File"></a></td>
                                </tr>
                            <?php } ?>                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>           
				<p align="center">
				<a href="<?php echo ASSETS_BACKEND_DIR; ?>?q=MasterData/SpecialLeave/AddSpecialLeave.php&Link=1"><button class="btn" type="button">Add</button>   
				</p>
            <div class="dr"><span></span></div>            
        </div>
    </div>   
<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>