// This is called with the results from from FB.getLoginStatus().
      function statusChangeCallback(response) {
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
          
        } else if (response.status === 'not_authorized') {
          window.location.replace("/comment-manager/index.php");
        } else {
           window.location.replace("/comment-manager/index.php");
        }
      }
      function checkLoginState() {
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
          
        });
      }
      
      function logoutFunction() {
         FB.getLoginStatus(function(response) {
		if (response && response.status === 'connected') {
		    FB.logout(function(response) {
			window.location.replace("/comment-manager/index.php");
		    });
		}
	 });
      }

      window.fbAsyncInit = function() {
        FB.init({
          appId: '699467151060285',
          cookie: true, // enable cookies to allow the server to access 
          // the session
          xfbml: true, // parse social plugins on this page
          version: 'v2.2' // use version 2.2
        });

        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });

      };

      // Load the SDK asynchronously
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
