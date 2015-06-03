<?php
session_start();
require_once 'functions.php';
$isLoggedIn = false;
$user = nil;
if (!$_SESSION['id']>0) {
	header("Location: login.php"); /* Redirect browser */
exit();
}
else if ($_SESSION['id'] > 0) {
	$isLoggedIn = true;
	$user = getUser($_SESSION['id']);

	echo $user['email'];
}
echo '<!Doctype html>
<html>
<head>
<title>Barter User</title>
<link rel="stylesheet" type="text/css" href="mycss.css"/>
<script type="text/javascript">

</script>

</head>
<body>
<!-- 	<div id="div1"> -->
	<div id="topid">
		<img id="logoid" src="logo.jpg" alt="logo">
		<div id="hmenu">
			<ul>
				<li><a href="home.html" style="text-decoration:none">Home</a></li>
				<li><a href="about.html" style="text-decoration:none">About</a></li>
				<li><a href="user.php" style="text-decoration:none">User</a></li>
				<li><a href="searchskills.php" style="text-decoration:none">SearchSkills</a></li>
				<li><a href="contact_barter.html" style="text-decoration:none">Contact</a></li>';
if ($_SESSION['id'] > 0) {
echo '			<li><a href="logout.php" style="text-decoration:none; color:red">Logout</a></li>';				
}
else {
echo '			<li><a href="login.php" style="text-decoration:none">Login</a></li>';	
}
echo			'</ul>
		</div>
<!-- 	</div> -->

	<div id="contentBarter">
	
	
			<div id="sideSecId">
			<form name="edit" method="post">
			<img id="userimgid" src="questionProfile.png" alt="userpic">';
			echo '
			'.'<br><b>Username: '.$user['userName'].' (Cannot change)<b><br><br>'.'
			<h3> Contact Details</h3>
			<input type="text" value='.$user['email'].'></input>
			</div>
			
			<div id="infoid">
			<label for="firstName"><h4>First Name</h4></label>
			<input name="firstName" type="text" value='.$user['firstName'].'></input><br>
			<label for="lastName"><h4>Last Name</h4></label>
			<input name="lastName" type="text" value='.$user['lastName'].'></input>
			
				<h4>About</h4>
				<p>
					<textarea name="biography" type="text" >'.$user['biography'].'</textarea>
				</p>
				
				<h4>Expertise:</h4>
				<p>
					<textarea name="expertiseIn" type="text" >'.$user['expertiseIn'].'</textarea>
				</p>
				
				<h4>Looking to learn:</h4>
				<p>
					<textarea name="lookingFor" type="text" >'.$user['lookingFor'].'</textarea>
				</p>'.'
				
			</div>
			</form>
		
	</div>

	<div id="footer">
	<hr>
	<h5>Copyright &copy 2015,designed by <a href="#123" style="color: #E00000"> Barter</a> | <a href="#123" style="color: #E00000"> Privacy Policy</a></h5>
	</div>
</div>
</body>

</html>';
?>