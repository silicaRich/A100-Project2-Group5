// switches between tabs.

	var currentTab = 0;

	function Load() {
	}

	function tab_enter(tabID) {
		if (tabID == 0) {
			if (currentTab == 1 || currentTab == 2 || currentTab == 3) {
				document.getElementById("firstTab").className = "tabHover";
			return;
			}
		}
		if (tabID == 1) {
			if (currentTab == 0 || currentTab == 2 || currentTab == 3) {
				document.getElementById("secondTab").className = "tabHover";
		return;
			}
		}
		if (tabID == 2) {
			if (currentTab == 0 || currentTab == 1 || currentTab == 3){
				document.getElementById("thirdTab").className = "tabHover";
		return;
			}
		}
	}

	function tab_leave(tabID) {
		if (currentTab == 0) {
			document.getElementById("secondTab").className = "inactiveTab";
			document.getElementById("thirdTab").className = "inactiveTab";
		}
		if (currentTab == 1) {
			document.getElementById("firstTab").className = "inactiveTab";
			document.getElementById("thirdTab").className = "inactiveTab";
		}
		if (currentTab == 2){
			document.getElementById("firstTab").className = "inactiveTab";
			document.getElementById("secondTab").className = "inactiveTab";
		}
	}

	function tab_click(tabID) {
		// event handler for tabs
		if (tabID == 0) { // tabID 0 indicates the first tab was clicked, so show the content in the first tab and set the current tab
			if (currentTab != 0) {
				currentTab = 0;
				document.getElementById("firstTab").className = "selectedTab";
				document.getElementById("secondTab").className = "inactiveTab";
				document.getElementById("thirdTab").className = "inactiveTab";
				document.getElementById("firstTabContent").className = "activeTabContent";
				document.getElementById("secondTabContent").className = "inactiveTabContent";
				document.getElementById("thirdTabContent").className = "inactiveTabContent";
			}
		}
		if (tabID == 1) { // tabID 1 indicates the second tab was clicked, so show the content in the second tab and set the current tab
			if (currentTab != 1) {
				currentTab = 1;
				document.getElementById("secondTab").className = "selectedTab";
				document.getElementById("firstTab").className = "inactiveTab";
				document.getElementById("thirdTab").className = "inactiveTab";
				document.getElementById("secondTabContent").className = "activeTabContent";
				document.getElementById("firstTabContent").className = "inactiveTabContent";
				document.getElementById("thirdTabContent").className = "inactiveTabContent";
			}
		}
		if (tabID == 2) { // tabID 2 indicates the third tab was clicked, so show the content in the third tab and set the current tab
			if (currentTab != 2) {
				currentTab = 2;
				document.getElementById("thirdTab").className = "selectedTab";
				document.getElementById("secondTab").className = "inactiveTab";
				document.getElementById("firstTab").className = "inactiveTab";
				document.getElementById("thirdTabContent").className = "activeTabContent";
				document.getElementById("secondTabContent").className = "inactiveTabContent";
				document.getElementById("firstTabContent").className = "inactiveTabContent";
			}
		}
	}

//facebook login
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '468413103234050', // App ID
    channelUrl : 'http://localhost/A100-Project2-Group5/', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };
  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
  
  
  // google maps api 
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(41.3081, 72.9286),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);