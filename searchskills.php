<?php
$name = nil;
$error = nil;
$email = nil;
$users = array();
if ($_POST["name"]) {
	$name = $_POST["name"];
	$link = mysql_connect("localhost", "root","root","root") or die ("Could not connect to MySQL");
	mysql_select_db("Contact_Barter");
	$query = "SELECT * FROM UserData WHERE firstName='".$name."'";
	if ($result = mysql_query($query, $link)) {
		echo "num rows: ".mysql_num_rows($result)."</br>";
		while ($row = mysql_fetch_array($result)) {
			array_push($users,$row);
		}
		//echo "count: ";
		//print_r($users);
		echo "</br>";
	}
	else {
		#$myError = mysql_error();
		$error = "Query failed.";
		echo "\nquery not working: ".mysql_error();
	}
}
else {
	echo "no one is searching";
}

echo '<!Doctype html>
<html>
<head>
<title>SearchSkills</title>
<link rel="stylesheet" type="text/css" href="mycss.css"/>
<script type="text/javascript">

</script>

</head>
<body>
	<div id="topid">
        <img id="logoid" src="logo.jpg" alt="logo" text="Barter">
		<div id="hmenu">
		<ul>
		<li><a href="home.html" style="text-decoration:none">Home</a></li>
		<li><a href="about.html" style="text-decoration:none">About</a></li>
		<li><a href="user.html" style="text-decoration:none">User</a></li>
		<li><a href="searchskills.php" style="text-decoration:none">SearchSkills</a></li>
		<li><a href="contact_barter.html" style="text-decoration:none">Contact</a></li>
		</ul>
		</div>
	</div>
	<h1>Search</h1>
	<div id="searchContainer">
		<div id="leftSearchbar">
			<a href="searchskills.html"><u>cooking</u></a><br>
			<a href="searchskills.html"><u>cleaning</u></a><br>
			<a href="searchskills.html"><u>programming</u></a><br>
			<a href="searchskills.html"><u>dancing</u></a>
		</div>
		<div id="rightSearchbar">
			<form method="post">
				<label id="searchLabel" for="name">Search by name:</label>
				<input name="name" type='.'text'.'></input>
				<input type="submit" name="searchName" value="Search">
			</form>';
if ($name != nil) {			
echo		'<p>Result(s) for '.$name.':</p>
			';
	if ($error == nil) {
		foreach ($users as $eachUser) {
			echo		'<div id="result1">
				<img id="user1" src="questionProfile.png" alt="profile image">
				<div id="userText1"><a href="searchskills.html">'.$eachUser["firstName"].' '.$eachUser["lastName"].'</a><br>5 years</div>
			</div>
			';
		}
	}
	else {
		echo "There was a connection error.";
	}
}
			echo'
		</div>
	</div>

	<div id="footer">
		<h5>Copyright © 2015,designed by <a href="#123" style="color: #E00000"> Barter</a> | <a href="#123" style="color: #E00000"> Privacy Policy</a></h5>
	</div>
	<script type="text/javascript">
		function _(x) {
			return document.getElementById(x);
		}
	</script>
</body>
</html>';
?>