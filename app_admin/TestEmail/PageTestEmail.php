<?php 
include APP_BACKEND_DIR.'layouts'.DS.'header.php';

$msg_body = '<table><tr><td>Halo brada!</td><td> this is a test email message from awesome guy named Oka Prinarjaya</td></tr></table>';
$receiver = array(
	'monda_dicky@yahoo.com'
);

$send = sendEmail($receiver, 'Test email from awesome guy', $msg_body); // --> html email
?>

 <div class="row-fluid">
 	<div class="span12">
 		<div class="head clearfix">
 			<div class="isw-documents"></div>
 			<h1>
 				<?php 
 				if ($send) {
 					echo "Success send email";
 				} else {
 					echo "Failed to send email";
 				}
 				?>
 			</h1>
 		</div>

 		<div class="block-fluid">                      
                        
            <div class="row-form clearfix">
                <div class="span3">Message content</div>
                <div class="span9"><input type="text" name="message" class="validate[required]"></div>
            </div>

            <div class="row-form clearfix">
            	<button class="btn" id="btnSubmit" type="submit" name="DepartementInsert" value="Submit" >Submit</button>                                                           
            </div>
                        
        </div>
    </div>          
</div>

<?php
include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>