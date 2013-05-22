<?php

	$this->load->helper("form");	

?>
<html>
<head>

<style type="text/css">
	.leftTabs {
		background: white;
		height: 100%;
		margin-left: 5%;
		margin-right: 75%;
	}
	
	.selectedTab {
		background: gold;
		color: black;
	}
	
	.inactiveTab {
		background: 0099FF;
		color: black;
	}
	
	.tabHover {
		background: 00CCFF;
		color: black;
	}
	
	.tabContainer {
		background: gray;
		position: relative;
		width: 100%;
		height: 5%;
	}
	
	.activeTabContent {
		position: relative;
		visibility: visible;
	}
	
	.inactiveTabContent {
		position: absolute;
		visibility: hidden;
		height: 100%;
	}
	
	.collapsedContent {
		position: relative;
		margin-left: 15%;
		margin-right: 15%;
		visibility: hidden;
	}
	
	.visibleContent {
		position: relative;
		margin-left: 15%;
		margin-right: 15%;
		visibility: visible;
	}
	
	.tabContainerTable {
		position: relative;
		width: 100%;
		height: 100%;
		
	}
	
		.classesTable {
		border-style: solid;
		border-width: 1px;
		border-color: #DAA520;
	}
	
	.classesTable td {
		background: white;
		color: black;
	}
	
	.classesTable th {
		background: #FFD700;
		color: black;
	}
	
</style>

<title>Job Seekers</title>
</head>
<body onLoad="Load">
<table align="center" style="height:10px; width: auto">
<tr>
<td valign="middle">
<h2><font color="red">Welcome to CT NextJobs</font></h2>
</td>
</tr>
<tr>
<td align="center" valign="middle">
	<div class="centerTabs" id="tabs" align="center">

		<div>
	
		<div id="firstTabContent" class="activeTabContent">
			<div style="margin-top: 10px; margin-left: 15%; margin-right: 15%">
				<?php 
					$query = $this->db->get("jobpostings");
					echo (form_label("List of Job Postings On CT NextJobs"));
					if ($query->num_rows() > 0) {
						echo ("<table align=center class = classesTable>");
						echo ("<tr>");
						for ($i = 0; $i < $query->num_rows(); $i++) {
							if ($i % 3 == 0) {
								echo ("</tr>\n");
								echo ("<tr>\n");
							}
							echo ("<td>\n");
							echo ($query->row($i)->jobName);
							echo ("</td>\n");
						}
						echo("</table>");
					}
				?>
			</div>
		</div>
			
	</div>
	</div>
	
</td>
</tr>
</table>
</body>
</html>