<?php
	$this->load->helper("form");
?>
<html>
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/styles.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>static/js/loginview.js"></script>

<style>
	html, body, #map-canvas {
		margin: 0;
		padding: 0;
		height: 100%
}
</style>
<title>Connecticut Next Jobs</title>
</head>
<body>
    <img src="banner.png" class="img-rounded" width="700px"/>
    <div class="container-fluid">
     <div class="row-fluid">
        <div class="span2">
          <!--Sidebar content-->
          <!--SignIn-->
          <h2 class="form-signin-heading">Sign in:</h2>
        <?php 
		echo form_open("/LoginController/CheckValidLogin");
		$userInput = array("type" => "text", "id" => "username", "name" => "username",
				"style" => "width: 60%; height: 20px;","placeholder"=>"username");
		$passwordInput = array("type" => "text", "id" =>"password", "name" => "password",
				"style" => "width: 60%; height: 20px","placeholder"=>"password");
		$submitButton = array("type" => "submit", "id" => "submit", "name" => "submit",
				"style" => "width: 35%; height: 25px", "value" => "Submit");
		echo (form_input($userInput) . "<br/>");
		echo (form_password($passwordInput) . "<br/>");
		?> 
		<button class="btn btn-small btn-primary" type="submit">Sign in</button><br>
		</form>
          <!--/SignIn-->
          <!-- Button to trigger modal -->
          Don't have an account?<a href="#myModal" role="button" class="btn" data-toggle="modal">Create One!</a>
        </div>
        <div class="span10">
          <!--Body content-->
          <div class="tabbable">
            <ul id="myTab" class="nav nav-tabs">
              <li><a class="active" href="#home" data-toggle="tab"><i class="icon-home"></i>Home</a></li>
              <li><a href="#map" data-toggle="tab"><i class="icon-globe"></i>Map</a></li>
              <li><a href="#social" data-toggle="tab"><i class="icon-thumbs-up"></i>Social</a></li>
              <li><a href="#feedback" data-toggle="tab"><i class="icon-envelope"></i>Feedback</a></li>
              <li><a href="#jobs" data-toggle="tab"><i class="icon-pencil"></i>Jobs</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in" id="home">
                HOME ...  Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. 
              </div>            
              <div class="tab-pane fade in " id="map">
				<div id="map-canvas"></div>
			</div>         
              <div class="tab-pane fade in " id="social">
                <!--Twitter Feed-->
                <a class="twitter-timeline" href="https://twitter.com/KFCharron_/the-whiteboard" data-widget-id="342365302589374465">Tweets from Connecticut Innovators</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                <!--/Twitter Feed--> 
              </div>
			 <div class="tab-pane fade in " id="feedback">
            </div>
			<div class="tab-pane fade in jobsIFrameContainer active"  id="jobs">
				<iframe id="jobsResultsIFRAME" class="jobsResultsIFRAME" scrolling="yes" width="100%" height="100%" src="<?php echo base_url();?>index.php/JobSeekerController" frameborder="0"></iframe>
			</div>
			</div>
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="myModalLabel">New Account</h3>
              </div>
              <div class="modal-body">
                <p>Here is where all the new account stuff will go....</p>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-primary">Create Account</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
      //$('#myModal').modal(options);
    </script>
    <script>
        $(function () {
        $('#myTab a:first').tab('show');
        })
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
     <script type="text/javascript">
	var geocoder;
	var map;
	function initialize() {
 	 geocoder = new google.maps.Geocoder();
 	 var latlng = new google.maps.LatLng(41.3081, -72.9286);
 	 var mapOptions = {
 	   zoom: 10,
 	   center: latlng,
 	   mapTypeId: google.maps.MapTypeId.ROADMAP
 	 }
 	 map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 	  google.maps.event.addListenerOnce(map, 'idle', function(){
   	 pinAddress_func();
	});
	}
	function codeAddress() {
 	 var address = document.getElementById('address').value;
  	geocoder.geocode( { 'address': address}, function(results, status) {
   	 if (status == google.maps.GeocoderStatus.OK) {
   	   map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
	google.maps.visualRefresh = true;
  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
  }
</script>
</body>
</html>
