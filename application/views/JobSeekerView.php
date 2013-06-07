<?php

	$this->load->helper("form");

?>
<html>
<head>
<script src="<?php echo base_url();?>static/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Alef' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

<title>Welcome Seeker!</title>
</head>


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
}

google.maps.event.addDomListener(window, 'load', initialize);
	pinAddress_func = null;
	$(function() {
		function pinAddress(){
			var address=$('.address');
			var addressInput=$('#address');
			for(var i=address.length-1; i>=0; i--)
			{
				var addressText = address.eq(i).text();
				addressInput.val(addressText);
				codeAddress();
			}
		}
		pinAddress_func = pinAddress;
		}
		);




	</script>
<body>


<div id="panel">
      <input id="address" type="textbox" value="Sydney, NSW" style="display:none;">
      <input type="button" value="Geocode" onclick="codeAddress()" style="display:none;">
</div>


<div class="JobSeekerViewMainDiv">
            <!--<img src='http://newhiteboard.com/wp-content/uploads/2012/10/header.png'>-->
				<?php
					$this->db->from("jobpostings");
					$this->db->order_by("datePosted", "desc");
					$query = $this->db->get();
					//$query = $this->db->get("jobpostings");
					echo ("<h3>List of Job Postings On CT NextJobs</h3>");
					echo ("<div id=\"map-canvas\"></div>");
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


</body>
</html>