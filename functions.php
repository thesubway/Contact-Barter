<?php

function doLogin()
{
$errorMessage = '';
//retrieve the user name and password from the http request
$userName = $_POST['userName'];
$password = $_POST['password'];
//SQL Query to validate user's credentials
$sql = "SELECT * FROM UserData WHERE username = '$userName' AND password = '$password'";
//call to the function dbQuery in database.php to execute the given query
$result = dbQuery($sql);
//obtain the row from the resultset
$row = dbFetchAssoc($result);
//validate if resultset is empty; if empty then the user credentials does not matched
if(dbNumRows($result) > 0){
print 'Welcome '.$row['username'];
}
else{
$errorMessage = 'Wrong username or password!';
 print $errorMessage . ' ' . $sql; 
}
return $errorMessage;
}
?>