<?php

function doLogin()
{
$errorMessage = '';
//retrieve the user name and password from the http request
$userName = $_POST['userName'];
$password = $_POST['password'];
//SQL Query to validate user's credentials
$sql = "SELECT * FROM UserData WHERE userName = '$userName' AND password = '$password'";
//call to the function dbQuery in database.php to execute the given query
$result = dbQuery($sql);
//obtain the row from the resultset
$row = dbFetchAssoc($result);
//validate if resultset is empty; if empty then the user credentials does not matched
if(dbNumRows($result) > 0){
// print 'Welcome '.$row['userName'];
session_start();
$_SESSION['id'] = $row['id'];
$_SESSION['password'] = $password;
header("Location: user.php"); /* Redirect browser */
exit();
}
else{
$errorMessage = 'Wrong username or password! Try again!';
//  print $errorMessage . ' ' . $sql; 
header("Location: loginFail.php"); /* Redirect browser */
exit();
}
return $errorMessage;
}
function getUser($inputId) {
	$link = mysql_connect("localhost", "root","root","root") or die ("Could not connect to MySQL");
	mysql_select_db("Contact_Barter");
	$query = "SELECT * FROM UserData WHERE id = '".$inputId."'";
	if ($result = mysql_query($query, $link)) {
		$row = mysql_fetch_array($result);
		return $row;
	}
	else {
		return nil;
	}
}
?>