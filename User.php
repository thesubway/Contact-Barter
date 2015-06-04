<?php
session_start();
require_once 'functions.php';
$isLoggedIn = false;
$user = nil;
if (!$_SESSION['id']>0) {
	header("Location: login.php"); /* Redirect browser */
exit();
}
if ($_GET['id']) {
	$isLoggedIn = true;
	$user = getUser($_GET['id']);
}
else if ($_SESSION['id'] > 0) {
	$isLoggedIn = true;
	$user = getUser($_SESSION['id']);

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
		<img id="logoid" src="images/logo.jpg" alt="logo">
		<div id="hmenu">
			<ul>
				<li><a href="home.html" style="text-decoration:none">Home</a></li>
				<li><a href="about.html" style="text-decoration:none">About</a></li>
				<li><a href="user.php" style="text-decoration:none">User</a></li>
				<li><a href="searchskills.php" style="text-decoration:none">SearchSkills</a></li>
				<li><a href="contact_barter.html" style="text-decoration:none">Contact</a></li>';
if ($_SESSION['id'] > 0) {
echo	'			<br><li><a href="logout.php" style="text-decoration:none; color:red">Logout</a></li>';	
	if (!$_GET['id']) {
		echo '			<li><a href="edit.php" style="text-decoration:none; color:green">Edit</a></li>';
	}
}
else {
echo '			<br><li><a href="login.php" style="text-decoration:none">Login</a></li>';	
}
echo			'</ul>
		</div>
<!-- 	</div> -->

	<div id="contentBarter">
	
	
			<div id="sideSecId">
			<img id="userimgid" src="images/questionProfile.png" alt="userpic">';
			echo '
			<h3> Contact Details<h3>
			<h4>'.$user['email'].'</h4>
			</div>
			
			<div id="infoid">
			<h1>'.$user['firstName'].' '.$user['lastName'].'</h1>
			
				<h4>About</h4>
				<p>
				'.$user['biography'].'
				</p>
				
				<h4>Expertise:</h4>
				<p>
					'.$user['expertiseIn'].'
				</p>
				
				<h4>Looking to learn:</h4>
				<p>
					'.$user['lookingFor'].'
				</p>'.'
				
			</div>
		
	</div>

	<div id="footer">
	<hr>
	<h5>Copyright &copy 2015,designed by <a href="#123" style="color: #E00000"> Barter</a> | <a href="#123" style="color: #E00000"> Privacy Policy</a></h5>
	</div>
</div>

</body>

</html>';
?>