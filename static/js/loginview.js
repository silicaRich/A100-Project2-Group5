	<script type="text/javascript">
	$(document).ready(function() {
	$('li>a').each(function() {
			if($(this).attr('href') == '#jobs')
				$(this).click(function() {
					//$('#jobsResultsIFRAME').css("height", "" + $('#jobsResultsIFRAME').contents().find("body").height() + "px");
					//alert($('#jobsResultsIFRAME').contents().height() + "px");
				});
		});
		
		
	});
</script>