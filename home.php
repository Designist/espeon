<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Espeon</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
	
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  <style>
	body,html{
		height:100%;
	}
	body{
		background-image:url('images/background.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		
		opacity: 1;
		-webkit-animation: fadeIn 4s;
		animation: fadeIn 4s;
	}
	.frontPage{
		<!--background-color:rgba(0,0,0,.2); -->
		color:white;
	}
	@-webkit-keyframes fadeIn {
		from{opacity: 0;}
		to{opacity:1;}
	}

	@keyframes fadeIn {
		from{opacity: 0;}
		to{opacity:1;}
	}
  </style>

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	<div class="container">
		
		<div class="row">
			<div class="third column frontPage" style="margin-top: 5%">
				<h4><strong>Espeon: OneNote Quiz</strong></h4>
				<p style = "color:white"> You only get to this page if you're authenticated.</p>
			</div>
		</div>
		
		<div class = "row">
			<div id="two-third column form">
				<form method="POST" action="submit.php">
					<br />
					<input type="hidden" name="csrf_token" value="<?php /* Print the automatically generated session ID for CSRF protection */ echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
					<p>Enter Section Name:</p>
					<input type="text" name="section" />
					<br/>
					<button type="submit" name="submit" value="getPages">Get Pages (ignores section name, paginated)</button><br />
				</form>
	
			</div>
		
		</div>
	</div>
	<script src="//js.live.net/v5.0/wl.js" type="text/javascript"></script>
	<script type="text/javascript">
		// Update the following values
		var client_id = "%CLIENT_ID%",
			scope = ["wl.signin", "wl.basic", "wl.offline_access", "office.onenote_create"],
			redirect_uri = "%REDIRECT_URI_PATH%/callback.php";
		function id(domId) { 
			return document.getElementById(domId);
		}
		function displayMe() {  
			var imgHolder = id("meImg"),
				nameHolder = id("meName");
			if (imgHolder.innerHTML != "") return;
			if (WL.getSession() != null) {
				WL.api({ path: "me/picture", method: "get" }).then(
						function (response) {
							if (response.location) {
								imgHolder.innerHTML = "<img src='" + response.location + "' />";
							}
						}
					);
				WL.api({ path: "me", method: "get" }).then(
						function (response) {
							nameHolder.innerHTML = response.name;
						}
					);
			}
		}
		function clearMe() {
			id("meImg").innerHTML = "";
			id("meName").innerHTML = "";
		}
		WL.Event.subscribe("auth.sessionChange",
			function (e) {
				if (e.session) {
					displayMe();
				}
				else {
					clearMe();
				}            
			}
		);
		WL.init({ client_id: client_id, redirect_uri: redirect_uri, response_type: "code", scope: scope });
		WL.ui({ name: "signin", element: "signin" });
	</script>
   <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.4/angular.min.js"></script>  
    <script src="angular-websocket.js"></script>
    <script src='http://ajax.aspnetcdn.com/ajax/mobileservices/MobileServices.Web-1.2.5.min.js'></script>
    <script src="/scripts/app.js"></script>
    <script src="maincontrol.js"></script>


</body>
</html>
