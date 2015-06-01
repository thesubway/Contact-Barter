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



// Create connection
$conn = new mysqli($servername,$dbName, $userName, $password,$firstName,$lastName,$emailAddress);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO UserData (firstName, lastName, email,userName,password)
VALUES ('$firstName','$lastName','$emailAddress','$userName','$password')";

if (mysql_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>