<?php
$name = nil;
$skill = nil;
$error = nil;
$email = nil;
$users = array();
session_start();
// session_destroy();
if($_SESSION['id'] <= 0) {
	echo "currently no session id";
}
else {
	echo "session id: ".$_SESSION['id']."<br>";
}
if ($_POST["name"]) {
	$name = $_POST["name"];
	$link = mysql_connect("localhost", "root","root","root") or die ("Could not connect to MySQL");
	mysql_select_db("Contact_Barter");
	$query = "SELECT * FROM UserData WHERE firstName LIKE '%".$name."%' OR lastName LIKE '%".$name."%' OR userName LIKE '%".$name."%'";
	if ($result = mysql_query($query, $link)) {
		echo "num name rows: ".mysql_num_rows($result)."</br>";
		while ($row = mysql_fetch_array($result)) {
			array_push($users,$row);
		}
		//echo "count: ";
		//print_r($users);
		echo "</br>";
// 		session_destroy();
	}
	else {
		#$myError = mysql_error();
		$error = "Query failed.";
		echo "\nquery not working: ".mysql_error();
	}
	
}
else if ($_GET["skill"]) {
	$skill = $_GET["skill"];
	$link = mysql_connect("localhost", "root","root","root") or die ("Could not connect to MySQL");
	mysql_select_db("Contact_Barter");
	$query = "SELECT * FROM UserData WHERE expertiseIn LIKE '%".$skill."%'";
	if ($result = mysql_query($query, $link)) {
		echo "num skill rows: ".mysql_num_rows($result)."</br>";
		while ($row = mysql_fetch_array($result)) {
			array_push($users,$row);
		}
	}
	else {
		$error = "Query failed.";
		echo "\nquery not working: ".mysql_error();
	}
}
else {
	echo "no one is searching";
}
function displayResults($error,$users) {
	if ($error == nil) {
		foreach ($users as $eachUser) {
			echo		'<div id="result1">
				<img id="user1" src="questionProfile.png" alt="profile image">
				<div id="userText1"><a href="user.php?id='.$eachUser['id'].'">'.$eachUser["firstName"].' '.$eachUser["lastName"].'</a><br>5 years
				<br>'.$eachUser["userName"].'<br>'.$eachUser["expertiseIn"].'
				</div>
			</div>
			';
		}
	}
	else {
		echo "There was a connection error.";
	}
}
//?name=dan&searchName=Search

echo '<!Doctype html>
<html>
<head>
<title>Barter SearchSkills</title>
<link rel="stylesheet" type="text/css" href="mycss.css"/>
<script type="text/javascript">

</script>

</head>
<body>
<div id="main">
	<div id="topid">
        <img id="logoid" src="logo.jpg" alt="logo" text="Barter">
		<div id="hmenu">
		<ul>
		<li><a href="home.html" style="text-decoration:none">Home</a></li>
		<li><a href="about.html" style="text-decoration:none">About</a></li>
		<li><a href="user.php" style="text-decoration:none">User</a></li>
		<li><a href="searchskills.php" style="text-decoration:none">SearchSkills</a></li>
		<li><a href="contact_barter.html" style="text-decoration:none">Contact</a></li>
		</ul>
		</div>
	</div>
	<h1>Search</h1>
	<div id="searchContainer">
		<div id="leftSearchbar">
			<a href="searchskills.php?skill=cooking"><u>cooking</u></a><br>
			<a href="searchskills.php?skill=cleaning"><u>cleaning</u></a><br>
			<a href="searchskills.php?skill=programming"><u>programming</u></a><br>
			<a href="searchskills.php?skill=dancing"><u>dancing</u></a><br>
			<a href="searchskills.php?skill=piano"><u>piano</u></a>
		</div>
		<div id="rightSearchbar">
			<form method="post">
				<label id="searchLabel" for="name">Search by name:</label>
				<input name="name" type='.'text'.'></input>
				<input type="submit" name="searchName" value="Search">
			</form>';
if ($name != nil) {			
	echo		'<p>Result(s) for name: '.$name.':</p>
			';
	displayResults($error,$users);
}
else if ($skill != nil) {
	echo		'<p>Result(s) for skill: '.$skill.':</p>
			';
	displayResults($error,$users);
}
			echo'
		</div>
	</div>

	<div id="footer">
		<h5>Copyright &copy 2015,designed by <a href="#123" style="color: #E00000"> Barter</a> | <a href="#123" style="color: #E00000"> Privacy Policy</a></h5>
	</div>
	<script type="text/javascript">
		function _(x) {
			return document.getElementById(x);
		}
	</script>
</div>
</body>
</html>';
?>