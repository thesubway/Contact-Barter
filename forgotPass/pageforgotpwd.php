<?php

//include the files
require_once 'funcforgotpwd.php';
require_once 'dbforgotpwd.php';
$errorMessage = '&nbsp;';
if (isset($_POST['userName'])) {
$result = doLogin();
if ($result != '') {
$errorMessage = $result;
}
}
?>
<html>
<head>
<title>Contact Barter</title>
<link rel="stylesheet" type="text/css" href="../mycss.css"/>
</head>

<body>
<div id="contact_main">
	
	<div id="topid">
        <img id="logoid" src="../logo.jpg" alt="logo" text="Barter">
		<div id="hmenu">
			<ul>
			<li><a href="../home.html" style="text-decoration:none">Home</a></li>
			<li><a href="../about.html" style="text-decoration:none">About</a></li>
			<li><a href="../user.php" style="text-decoration:none">User</a></li>
			<li><a href="../searchskills.php" style="text-decoration:none">About</a></li>
			<li><a href="../contact_barter.html" style="text-decoration:none">Contact</a></li>
			</ul>
		</div>
	</div>

		<div id="contactarea">

		<p>Hey there! <br>
		<br>It is unfortunate that you forgot your password! Type in your username and we will send an email to your registered email address. </p>
		
		<form name = "forgot" method="post">
USERNAME *<input type="text" name = "userName" >
<br>

 
<input type = "submit" value = "submit">
</form>
		
		</div>

</div>


</body>
</html>
