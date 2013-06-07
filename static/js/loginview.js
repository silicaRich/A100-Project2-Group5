
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



//javascript for submit feedback

$(document).ready(function() {
	var FeedBackInputItem = $('.FeedBackInputItem');
	var FeedBackSubmit = $('.FeedBackSubmit');
	FeedBackSubmit.click(function(event) {
		var stopEvent = false;
		var message = "";
		FeedBackInputItem.each(function() {
			if($(this).val() == null || $(this).val().trim() == "") {
				stopEvent = true;
				message = message + "\n*" + $(this).attr('placeholder');
			}
		});

		if(stopEvent)
		{
			event.preventDefault();
			alert('Please fill out all of the fields' + message);
		}
	});

});



$(document).ready(function() {
	$('li > a').each(function() {
		if($(this).attr('href') == "#jobs") {
			$(this).click(function() {
				 google.maps.event.trigger(map, 'resize');
				 //map.setCenter(latlng);
				 alert('resized');
		 });
		}
	});
});
