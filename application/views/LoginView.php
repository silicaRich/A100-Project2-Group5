<?php
	$this->load->helper("form");
?>

<html>
<head>
<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet"> <!-- bootstrap stylesheet -->
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet"> <!-- bootstrap stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/styles.css"> <!-- dolphin mophia stylesheet -->
<script src="<?php echo base_url();?>static/js/jquery.min.js"></script> <!-- jquery reference -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> <!-- call to google maps api -->
<link href='http://fonts.googleapis.com/css?family=Alef' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>static/js/loginview.js"></script>
<script language="JavaScript">
function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document.body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document.body.scrollWidth;
    }

    //alert(newheight+"asd");
    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
    //$("#"+id).attr('scrolling','no');
}
</script>
<title>Connecticut Next Jobs</title>
</head>
<body>
    <img src="<?php echo base_url();?>banner.png" class="img-rounded" width="700px"/>
    <div class="container-fluid">
     <div class="row-fluid">
        <div class="span2">
          <!--Sidebar content-->
          <!--SignIn-->
          <h2 class="form-signin-heading">Sign in:</h2>
        <?php
		echo form_open("/LoginController/CheckValidLogin");
		$userInput = array("type" => "text", "id" => "username", "name" => "username",
				"class" => "inputBox signInBox","placeholder"=>"username");
		$passwordInput = array("type" => "text", "id" =>"password", "name" => "password",
				"class" => "inputBox signInBox","placeholder"=>"password");
		$submitButton = array("type" => "submit", "id" => "submit", "name" => "submit", "value" => "Submit");
		echo (form_input($userInput) . "<br/>");
		echo (form_password($passwordInput) . "<br/>");
		?>
		<button class="btn btn-small btn-primary SignInBtn" type="submit">Sign in</button><br>
		</form>
          <!--/SignIn-->
          <!-- Button to trigger modal -->
          Don't have an account?<a href="#myModal" role="button" class="btn CreateOneAnchor" data-toggle="modal">Create One!</a>
        </div>
        <div class="span10">
          <!--Body content-->
          <div class="tabbable">
            <ul id="myTab" class="nav nav-tabs">
              <li><a class="active" href="#home" data-toggle="tab"><i class="icon-home"></i>Home</a></li>
              <li><a href="#social" data-toggle="tab"><i class="icon-thumbs-up"></i>Social</a></li>
              <li><a href="#feedback" data-toggle="tab"><i class="icon-envelope"></i>Feedback</a></li>
              <li><a href="#jobs" data-toggle="tab"><i class="icon-pencil"></i>Jobs</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in" id="home">
                HOME ...  Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.
              </div>
              <div class="tab-pane fade in " id="social">
                <!--Twitter Feed-->
                <a class="twitter-timeline" href="https://twitter.com/KFCharron_/the-whiteboard" data-widget-id="342365302589374465">Tweets from Connecticut Innovators</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                <!--/Twitter Feed-->
              </div>
			 <div class="tab-pane fade in " id="feedback">
			         <?php
			 		echo form_open("/LoginController/SubmitComments");
			 		$fNameComment = array("type" => "text", "id" => "fName", "name" => "fName", "class" => "FeedBackInputName inputBox FeedBackInputItem","placeholder"=>"First Name");
			 		$lNameComment = array("type" => "text", "id" => "lName", "name" => "lName", "class" => "FeedBackInputName inputBox FeedBackInputItem","placeholder"=>"Last Name");
			 		$emailComment = array("type" => "text", "id" => "email", "name" => "email", "class" => "FeedBackInputEmail inputBox FeedBackInputItem","placeholder"=>"Email Address");
			 		$cComment = array("type" => "text", "id" => "comments", "name" => "comments", "class" => "FeedBackInputArea FeedBackInputItem","placeholder"=>"Enter your comment(s) here.");

			 		echo (form_input($fNameComment));
			 		echo (form_input($lNameComment) . "<br/>");
			 		echo (form_input($emailComment) . "<br/>");
			 		echo (form_textarea($cComment) . "<br/>");
				?>
				<button class="btn btn-small btn-primary FeedBackSubmit" type="submit">Submit</button><br>
				</form>
            </div>
			<div class="tab-pane fade in jobsIFrameContainer JobSeekerViewMainDiv"  id="jobs">
				<!--<iframe id="jobsResultsIFRAME" onLoad="autoResize('jobsResultsIFRAME');" class="jobsResultsIFRAME" scrolling="yes" width="100%" height="100%" src="<?php echo base_url();?>index.php/JobSeekerController" frameborder="0"></iframe>-->
				<?php
				$this->db->from("jobpostings");
									$this->db->order_by("datePosted", "desc");
									$query = $this->db->get();
									//$query = $this->db->get("jobpostings");
									echo ("<input id=\"address\" type=\"textbox\" value=\"Sydney, NSW\" style=\"display:none;\">");
									echo ("<h3>List of Job Postings On CT NextJobs</h3>");
									echo ("<div id=\"map_canvas\"></div>");
									echo ("<br/><br/><br/>");
									if ($query->num_rows() > 0) {
										for ($i = 0; $i < $query->num_rows(); $i++)
										{
											echo ("<table class=\"jobDescription\">");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowNumber\"\n colspan=\"2\">");
											echo ("<div>Posting #". ($i + 1) . "</div><br />");
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Internship/Job Name: </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ($query->row($i)->jobName);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Company Name:  </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ($query->row($i)->companyName);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Date Posted:  </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ($query->row($i)->datePosted);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Address: </p>");
											echo ("</td>\n");
											echo ("<td class=\"address\">\n");
											echo ($query->row($i)->address);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Contact Email: </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ("<a href=mailto:".$query->row($i)->contactEmail . ">" .$query->row($i)->contactEmail . "</a>");
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Job Description </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ($query->row($i)->jobDescription);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Job Requirements: </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ($query->row($i)->skillsRequired);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Other Information: </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ($query->row($i)->other);
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("<tr>\n");
											echo ("<td class=\"JobRowDescription\">\n");
											echo ("<p>Company Web Site: </p>");
											echo ("</td>\n");
											echo ("<td>\n");
											echo ("<a href=http://".$query->row($i)->companySite . ">" .$query->row($i)->companySite . "</a>");
											echo ("</td>\n");
											echo ("</tr>\n");
											echo ("</table>");
											if($i != $query->num_rows()-1)
												echo ("<div class=\"jobRuler\"></div>");
										}
					}
				?>
			</div>
			</div>
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="myModalLabel">New Account</h3>
              </div>
              <div class="modal-body">
                <!--This is the pop up div that allows one to register.-->
				<?php $this->load->helper("form");?>

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

<table align="left" width="100%">
<tr>
<td align="left" valign="middle">
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

	<div id="firstTabContent" class="activeTabContent"> <!-- Registration for Job Seeker -->
		<?php
				echo ("<div class=\"registrationDiv registrationTable\">");
				echo(form_open("LoginController/SubmitJobSeeker"));
				echo ("<table width=\"100%\">");
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

				echo ("</table>");
				echo ("</div>");
				echo ("<div class=\"modal-footer\">");
				echo ("<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Cancel</button>");
				echo ("<button class=\"btn btn-primary\">Create Account</button>");
				echo ("</div>\n");
				echo (form_close() . "\n");

				?>

		</div>

		<div id="secondTabContent" class="inactiveTabContent"> <!-- Registration for Job Poster -->
			<div style="margin-top: 10px;">
			<?php
				echo ("<div class=\"registrationTable\">");
				echo(form_open("LoginController/SubmitJobPoster"));
				echo ("<table width=\"100%\"> ");
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

				echo ("</table>");
				echo ("</div>");
				echo ("<div class=\"modal-footer\">");
				echo ("<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Cancel</button>");
				echo ("<button class=\"btn btn-primary\">Create Account</button>");
				echo ("</div>\n");
				echo (form_close() . "\n");
				?>
		</div>
		</div>
		</div>
		</table>
              </div>
             <!-- <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-primary">Create Account</button>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
    <script>
      //$('#myModal').modal(options);
    </script>
    <script>
        $(function () {
        $('#myTab a:first').tab('show');
        })
    </script>
	
	
	
<ul class="unorderedList">
 <li class="list"><a class="ahref">Privacy Policy</a></li>
 <li class="list"><a class="ahref">Terms of Use</a></li>
 <li class="list"><a class="ahref">Contact</a></li>
</ul>
	
	
</body>
</html>
