<?php

	$this->load->helper("form");	

?>
<html>
<head><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Alef' rel='stylesheet' type='text/css'>
<title>Job Posting</title>
</head>
<body>
<div class="centerTabs" id="tabs" align="center">
<div>
		<div id="firstTabContent" class="activeTabContent">
		<img src="<?php echo base_url();?>static/images/postajobbannerM.png"></img><br>
		<?php 
		if (isset($jobposting_success)) {
			echo ("<p align=center>" . $jobposting_success . "</p>");
		}
		else {
		echo ("<p align=center><font color=red>" . validation_errors() . "</font></p>");
				echo ("<p align=center>Use this form to submit job postings</p>");
		}
				echo ("\n<br />\n");
				echo (form_open("LoginController/SubmitJobPosting"));
				echo ("\n<table align=center>\n");
			
					echo ("<tr>\n");
					echo ("<td>\n");
					echo ("Job Name:");
					echo ("</td>\n");
					echo ("<td>\n");
					echo (form_input(array("id" => "jobName", "name" => "jobName", "type" => "text")));
					echo ("</td>");
					echo ("</tr>\n");
					
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
					echo ("Job Description:");
					echo ("</td>\n");
					echo ("<td>\n");
					echo (form_input(array("id" => "jobDescription", "name" => "jobDescription", "type" => "text")));
					echo ("</td>");
					echo ("</tr>\n");
					
					echo ("<tr>\n");
					echo ("<td>\n");
					echo ("Company Contact Email:");
					echo ("</td>\n");
					echo ("<td>\n");
					echo (form_input(array("id" => "contactEmail", "name" => "contactEmail", "type" => "text")));
					echo ("</td>");
					echo ("</tr>\n");
					
					echo ("<tr>\n");
					echo ("<td>\n");
					echo ("Company URL:");
					echo ("</td>\n");
					echo ("<td>\n");
					echo (form_input(array("id" => "companySite", "name" => "companySite", "type" => "text")));
					echo ("</td>");
					echo ("</tr>\n");
					
					echo ("<tr>\n");
					echo ("<td>\n");
					echo ("Skills Required:");
					echo ("</td>\n");
					echo ("<td>\n");
					echo (form_input(array("id" => "skillsRequired", "name" => "skillsRequired", "type" => "text")));
					echo ("</td>");
					echo ("</tr>\n");
					
					echo ("<tr>\n");
					echo ("<td>\n");
					echo ("Other:");
					echo ("</td>\n");
					echo ("<td>\n");
					echo (form_input(array("id" => "other", "name" => "other", "type" => "text")));
					echo ("</td>");
					echo ("</tr>\n");

				echo ("<tr>\n");
				echo ("<td colspan=2>\n");
				echo (form_submit(array("name" => "minorSubmit", "value" => "Submit", "style" => "width: 47%; margin-right: 3%")));
				echo (form_reset(array("name" => "minorReset", "style" => "width: 47%; margin-left: 3%"), "Reset"));
				echo ("</td>\n");
				echo ("</tr>\n");
				echo ("</table>");
				echo (form_close() . "\n");
				?>
				</div>
				</div>
				</div>
				
</body>
</html>