</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#DatepickerStart").datepicker({dateFormat: 'yy-mm-dd',});
	$("#DatepickerEnd").datepicker({
	dateFormat: 'yy-mm-dd',
		onSelect: function (dateText, inst) {
			var periodeAwal = $('#DatepickerStart');
			var periodeAkhir = $('#DatepickerEnd');
			$.ajax({
				type:'get',
				url:'<?php echo ASSETS_BACKEND_DIR; ?>?q=TotalDays.php',
				data:{"StartingDate":periodeAwal.val(), "EndDate":periodeAkhir.val()},
				dataType:'json',
				cache:false,
				success: function (data) {
					$('#lama_cuti').val(data.total_days);
				}
			});
		}
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){    
	$('#startDate').datepicker({
		dateFormat: 'yy-mm-dd',
		onSelect: function (dateText, inst) {
			$.ajax({
			type:'get',
			url:'<?php echo ASSETS_BACKEND_DIR; ?>?q=TotalDaysSl.php',
			data:{"startDate":$(this).val(), "totalDays":$('#lama_cuti').val()},
			dataType:'json',
			cache:false,
			success: function (data) {
				$('#end_date').val(data.end_date);
			},
			error : function (data) {
				alert("error");
			}
		});
		}
	});
	$("#selectName").change(function() {
		$.ajax({
			type:'get',
			url:'<?php echo ASSETS_BACKEND_DIR; ?>?q=SpecialLeave.php',
			data:{"code":$(this).val()},
			dataType:'json',
			cache:false,
			success: function (data) {
				$('#lama_cuti').val(data.days);
			}
		});
	});
	
});
</script> 

<script type="text/javascript">
$(document).ready(function(){    
          $("#GetEmployeeId").autocomplete('<?php echo ASSETS_BACKEND_DIR; ?>GetEmployee.php', {
            width: 300,
            matchContains: true,
            scroll: true,
            scrollHeight: 300
          });
        }
      );
    </script>
	
<script type="text/javascript">
$(document).ready(function(){    
    $( "#btnSubmit" ).click(function() {
		$.validationEngineLanguage.newLang();
	});
});
</script>
	<script language="JavaScript">
function konfirmasi() {
   return confirm("Are You Sure To Delete ?");
}
</script>
<?php
$count_add_js = count($GLOBALS['__additional_javascripts']);
if ($count_add_js !== 0) {
    foreach ($GLOBALS['__additional_javascripts'] as $item) {
	    echo "<script type=\"text/javascript\" src=\"".ASSETS_BACKEND_URL."js/".$item."\"></script>";
		echo "\n";
	}
}
?>

</body>
</html>