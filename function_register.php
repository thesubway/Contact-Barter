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


if(empty($_POST['userName']) ||
       empty($_POST['lastName']) ||
       empty($_POST['emailAddress']) ||
       empty($_POST['firstName']) ||
       empty($_POST['password'])) {
       //died('We are sorry, but there appears to be a problem with the form you submitted.');     
       return false;  
   }

$sql = "INSERT INTO UserData (firstName, lastName, email,userName,password,biography,expertiseIn,lookingFor,contactDetails)
VALUES ('$firstName','$lastName','$emailAddress','$userName','$password','$biography','$expertiseIn','$lookingFor','$contactDetails')";
if (mysql_query($sql) === TRUE) {
//     echo "New record created successfully";
    echo "New record created successfully! <script>
	window.setTimeout(function(){
		window.location.href='login.php';
    }, 750);
</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>