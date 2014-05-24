<?php
include APP_BACKEND_DIR.'layouts'.DS.'header.php';
?>

<div class="row-fluid">
	
	<div class="span12">
	
		<div class="head clearfix">
			<div class="isw-documents"></div>
			<h2>Add schedule</h2>
		</div>
		
		<div class="block-fluid">                        
			
			<form id="validation" method="post" action="<?php echo form_action('Attendance/Schedule/cud.php', 'tindakan=create&id=1'); ?>">
				<div class="row-form clearfix">
					<div class="span3">Nama</div>
					<div class="span9"><input type="text" class="validate[required]" name="name" /></div>
				</div> 

				<div class="row-form clearfix">
					<div class="span3">Email</div>
					<div class="span9"><input type="text" name="email" /></div>
				</div>
				
				<div class="row-form clearfix">
				    <button id="btnSubmit" class="btn" type="submit">Save</button>
					
					<button id="tralala" class="btn" type="button">Tralala</button>
				</div>
			</form>
			
		</div>
	</div>
	
</div>

<?php
add_javascript(array(
    'attendance/schedule/AddSchedule.js'
));

include APP_BACKEND_DIR.'layouts'.DS.'footer.php';
?>