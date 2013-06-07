<html>
<?php

	$this->load->helper("form");	

?>
<head>
<link href='http://fonts.googleapis.com/css?family=Alef' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>static/js/jquery.min.js"></script>
<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/styles.css">
<header><img src='http://newhiteboard.com/wp-content/uploads/2012/10/header.png'></header>
</head>

<script type="text/javascript">
$(document).ready(function(){
	var firstTab = $('#firstTabMenu');
	var secondTab = $('#secondTabMenu');
	var firstTabContent = $('#firstTabContent');
	var secondTabContent = $('#secondTabContent');
	
	
	firstTab.click(function() {
		makeTabInactive(secondTab);
		makeTabActive(firstTab);
		
		makeTabContentInactive(secondTabContent);
		makeTabContentActive(firstTabContent);
		
		//alert('hi the first tab is active');
	});
	secondTab.click(function() {
		makeTabInactive(firstTab);
		makeTabActive(secondTab);
		
		makeTabContentInactive(firstTabContent);
		makeTabContentActive(secondTabContent);
		
		//alert('hi the second tab is active');
	});
	function makeTabActive(tab)
	{
		tab.removeClass('inactiveTab');
		tab.addClass('activeTab');
	}
	function makeTabInactive(tab)
	{
		tab.removeClass('activeTab');
		tab.addClass('inactiveTab');
	}
	
	function makeTabContentActive(tab)
	{
		tab.removeClass('inactiveTabContent');
		tab.addClass('activeTabContent');
	}
	
	function makeTabContentInactive(tab)
	{
		tab.removeClass('activeTabContent');
		tab.addClass('inactiveTabContent');
	}
	
	firstTab.hover(inTab, offTab);
	secondTab.hover(inTab, offTab);
	
	function inTab()
	{
		$(this).addClass('onHover');
		//alert('hi im inside');
	}
	function offTab()
	{
		$(this).removeClass('onHover');
		//alert('hi im outside');
	}
	
});
</script>

<body>
<table align=left>
<tr>
<td align=left valign="middle">
	<div>
		<table style="width: 100%; height: 100%;">
			<tr>
				<td id="firstTabMenu" class="activeTab" align="center"> <!-- changed from second to first and inactive to active -->
					<p style="color:white;">New Job Seeker</p>
				</td>
				<td id="secondTabMenu" class="inactiveTab" align="center">
					<p style="color:white;">New Job Poster</p>
				</td>
			</tr>
		</table>
	</div>
			<div id="crap" class="" style="display:none;"> <!-- used to be activetabcontent -->
			<table style="position: relative; width: 100%;">
				<tr>
				<td align=center valign=middle> 
				
				
		<?php 
		echo form_open("/LoginController/CheckValidLogin");
		$userInput = array("type" => "text", "id" => "username", "name" => "username",
				"style" => "width: 60%; height: 20px;");
		$passwordInput = array("type" => "text", "id" =>"password", "name" => "password",
				"style" => "width: 60%; height: 20px");
		$submitButton = array("type" => "submit", "id" => "submit", "name" => "submit",
				"style" => "width: 35%; height: 25px", "value" => "Submit");
		$clearButton = array("type" => "button", "id" => "btnClear", "name" => "btnClear",
				"style" => "width: 30%; height: 25px; margin-left: 4%", "value" => "Clear");
		echo(form_label("username", "labelUser", null) . "<br />");
		echo (form_input($userInput) . "<br/>");
		echo (form_label("password") . "<br/>");
		echo (form_password($passwordInput) . "<br/>");
		echo (form_submit($submitButton));
		echo (form_input($clearButton));
		echo form_close();

		?> 
		
		</td>
		</tr>
		</table>
		
</div>

<div id="firstTabContent" class="activeTabContent"> <!-- used to be inactivetabcontent and secondtabcontent. -->
		<?php  
				echo ("<table>");
				echo(form_open("LoginController/SubmitJobSeeker"));
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("</td>\n");
				echo ("<td>\n");
				echo ("</td>");
				echo ("</tr>\n");
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("</td>\n");
				echo ("<td>\n");
				echo ("</td>");
				echo ("</tr>\n");
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("</td>\n");
				echo ("<td>\n");
				echo ("</td>");
				echo ("</tr>\n");
				
				
				
				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("First Name:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "firstName", "name" => "firstName", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Last Name:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "lastName", "name" => "lastName", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Address:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "address", "name" => "address", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("City:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "city", "name" => "city", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("State:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "state", "name" => "state", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("ZIP Code:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "zip", "name" => "zip", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Email Address:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "emailAddress", "name" => "emailAddress", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Telephone Number:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "telephone", "name" => "telephone", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");

				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Username:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "username", "name" => "username", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
	
				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Password:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_password(array("id" => "password", "name" => "password", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");

				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Confirm Password:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_password(array("id" => "confirmPassword", "name" => "confirmPassword", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
	
				echo ("<tr>\n");
				echo ("<td colspan=2>\n");
				echo (form_submit(array("name" => "submit", "value" => "Submit", "style" => "width: 47%; margin-right: 3%")));
				echo (form_reset(array("name" => "reset", "style" => "width: 47%; margin-left: 3%"), "Reset"));
				echo ("</td>\n");
				echo ("</tr>\n");
				echo ("</table>");
				echo (form_close() . "\n");

				?>
				
		</div>
		
		<div id="secondTabContent" class="inactiveTabContent"> <!-- used to be secondTabContent -->
			<div style="margin-top: 10px;">
			<?php  
				echo ("<table>");
				echo(form_open("LoginController/SubmitJobPoster"));
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Company Name:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "companyName", "name" => "companyName", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Address:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "address", "name" => "address", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("City:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "city", "name" => "city", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("State:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "state", "name" => "state", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("ZIP Code:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "zip", "name" => "zip", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
					
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Contact Email:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "contactEmail", "name" => "contactEmail", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");

				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Username:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_input(array("id" => "username", "name" => "username", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
	
				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Password:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_password(array("id" => "password", "name" => "password", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");

				
				echo ("<tr>\n");
				echo ("<td>\n");
				echo ("Confirm Password:");
				echo ("</td>\n");
				echo ("<td>\n");
				echo (form_password(array("id" => "confirmPassword", "name" => "confirmPassword", "type" => "text")));
				echo ("</td>");
				echo ("</tr>\n");
	
				echo ("<tr>\n");
				echo ("<td colspan=2>\n");
				echo (form_submit(array("name" => "submit", "value" => "Submit", "style" => "width: 47%; margin-right: 3%")));
				echo (form_reset(array("name" => "reset", "style" => "width: 47%; margin-left: 3%"), "Reset"));
				echo ("</td>\n");
				echo ("</tr>\n");
				echo ("</table>");
				echo (form_close() . "\n");

				?>
		</div>
		</div>
		</div>
		</table>
		<div id="map-canvas" style="width:40%; height:40%; margin-top: -15%; float:middle; margin-left:45%">
</div>
</table>
</body>
</html>