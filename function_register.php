<?php
function doRegister()
{
$errorMessage = '';
//retrieve the data from the http request
$servername = "localhost";
$dbName = "contact_Barter";
$userName = $_POST['userName'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$biography = $_POST['biography'];
$expertiseIn = $_POST['expertiseIn'];
$lookingFor = $_POST['lookingFor'];
$contactDetails = $_POST['contactDetails'];
// Create connection
$conn = new mysqli($servername,$dbName, $userName, $password,$firstName,$lastName,$emailAddress,$biography,$expertiseIn,$lookingFor,$contactDetails);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$postParams = array('userName','lastName','emailAddress','firstName','password','biography','expertiseIn','lookingFor');
foreach ($postParams as $eachParameter) {
if(empty($_POST[$eachParameter])) {
       //died('We are sorry, but there appears to be a problem with the form you submitted.');     
       return "Please enter ".$eachParameter;  
}
}
$sql = "SELECT * FROM UserData WHERE userName = '".$_POST['userName']."'";
if ($result = mysql_query($sql)) {
	if ((mysql_num_rows($result) != 0) && !($_SESSION['id'] > 0)) {
		return 'Sorry, username "'.$_POST['userName'].'" has already been taken.';
	}
}
else {
	return "connection failed";
}
if (!$_SESSION['id'] > 0) {
	$sql = "INSERT INTO UserData (firstName, lastName, email,userName,password,biography,expertiseIn,lookingFor,contactDetails)
VALUES ('$firstName','$lastName','$emailAddress','$userName','$password','$biography','$expertiseIn','$lookingFor','$contactDetails')";
}
else {
	$sql = "UPDATE `UserData` SET `email`='$emailAddress',`userName`='$userName',`firstName`='$firstName',`lastName`='$lastName',`password`='$password',`biography`='$biography',`expertiseIn`='$expertiseIn',`lookingFor`='$lookingFor',`contactDetails`='$contactDetails' WHERE userName = '".$_POST['userName']."'";
}
if (mysql_query($sql) === TRUE) {
//     echo "New record created successfully";
	$success = "New record created successfully!";
	if ($_SESSION['id'] > 0) {
		$success = "Record updated succcessfully!";
	}
    echo " <script>
    alert('".$success."');";
if (!$_SESSION['id'] > 0) {
echo "window.setTimeout(function(){
		window.location.href='login.php';
    }, 750); "; 
}
echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>