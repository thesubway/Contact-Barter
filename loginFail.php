<?php
//Mallika's php:
//include the files
require_once 'functions.php';
require_once 'database.php';
$errorMessage = '&nbsp;';
if (isset($_POST['userName'])) {
$result = doLogin();
if ($result != '') {
$errorMessage = $result;
}
}

?>
<?php
//Mallika's php:
//include the files
require_once 'functions.php';
require_once 'database.php';
$errorMessage = '&nbsp;';
if (isset($_POST['userName'])) {
$result = doLogin();
if ($result != '') {
	//incorrect password
$errorMessage = $result;
	print 'alert("Incorrect username/password")';
	//exit();
}
else {
	exit();
}
}

?>
<html>
<head>
<title>Barter User login</title>
<link rel="stylesheet" type="text/css" href="mycss.css"/>
<style>
div#contentBarter{ border:#000 1px solid; padding:10px 40px 40px 40px; border-color:#0C8DA6;}
div#loginid{ border:#000 1px solid; padding:10px 40px 40px 40px;border-radius: 25px;}			
</style>
</head>

<body>
<div id="div50">
	<div id="topid">
		<img id="logoid" src="logo.jpg" alt="logo">

	
		<div id="hmenu">
			<ul>
				<li><a href="home.html" style="text-decoration:none">Home</a></li>
				<li><a href="about.html" style="text-decoration:none">About</a></li>
				<li><a href="user.php" style="text-decoration:none">User</li>
				<li><a href="searchskills.php" style="text-decoration:none">SearchSkills</li>
				<li><a href="contact_barter.html" style="text-decoration:none">Contact</a></li>
			</ul>
		</div>
	</div>

	<div id="contentBarter">
	
				
				<div id="loginid">
				<img id="loginLogoId" src="loginIcon.png" alt="loginLogo">
				<p>
					<b>Incorrect Username/password</b>
					<form name = "login" method="post">
						USERNAME <input type="text" name = "userName" >
					<br>
					<!-- The following input box accepts password hence type should be “password” but for
					simplicity we assume it as basic “text” field -->
					PASSWORD <input type="password" name = "password" >
					<input type = "submit" value = "submit">
					</form>
					<br>
					<br>
					
					<br>
					<a href="#ForgotPassword">Forgot Password?</a>
					<a href="#NewUser"> | New User?</a>
				</p>
				</div>
		
	</div>

	<div id="footer">
	
	<h5>Copyright © 2013,designed by <a href="#123" style="color: #E00000"> Barter</a> | <a href="#123" style="color: #E00000"> Privacy Policy</a></h5>
	</div>
</div>
</body>

</html>