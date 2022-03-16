
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <title>Create simple login page with PHP and MySQL</title>
        <link rel="apple-touch-icon" href="icon.png">
        <link rel="stylesheet" href="main.css">
        <meta name="theme-color" content="#fafafa">
    </head>
    <body>
	    <div class="form">
		<div class="form-main">
		    <div class="thumbnail"><img src="gplex.svg"/></div>
		   <button class="btn btn-info btn-sm"  onclick="loginFunction()" > 
		   
		   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"/><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"/></svg>
		   
		   Login with facebook </button>
		</div>
	    </div>
	    <script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId            : '699467151060285',
		      cookie: true,
		      autoLogAppEvents : true,
		      xfbml            : true,
		      version          : 'v13.0'
		    });
		    FB.getLoginStatus(function(response) {
		        console.log("Hello");
          		statusChangeCallback(response);
        	    });
		  };
		  function loginFunction() {
			 FB.login(function(response) {
				if (response && response.status === 'connected') {
				   window.location.replace("/comment-manager/home.php");
				}
			 }, {scope:'instagram_basic,instagram_manage_comments,instagram_manage_insights,instagram_content_publish,instagram_manage_messages'});
	      	 }
	      	 
	      	 
	      	 function statusChangeCallback(response) {
			if (response.status === 'connected') {
			  window.location.replace("/comment-manager/home.php");
			} else if (response.status === 'not_authorized') {

			} else {
			  
			}
	      }
	   </script>
	   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    </body>
</html>

