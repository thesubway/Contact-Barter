<?php

function doLogin()
{
$errorMessage = '';
//retrieve the user name from the http request
$userName = $_POST['userName'];

//SQL Query to validate user's credentials
$sql = "SELECT * FROM UserData WHERE username = '$userName'";
//call to the function dbQuery in database.php to execute the given query
$result = dbQuery($sql);
//obtain the row from the resultset
$row = dbFetchAssoc($result);
//validate if resultset is empty; if empty then the user credentials does not matched
if(dbNumRows($result) > 0){
$sentEmail = 'Sent email to '.$row['email'];
echo " <script>
    alert('".$sentEmail."');
	window.setTimeout(function(){
		window.location.href='../login.php';
    }, 750);
</script>";


$email_to = $row['email'];
$email_subject = "Barter forgotten password";
$email_message = "Your password was:\n\n";
     
    
     
    $email_message .= "Password: ".$row['password']."\n";
   // create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);


}
else{
$errorMessage = 'We have no user registered with username: '.$_POST['userName'];
echo "<script>alert('".$errorMessage."');</script>";
}
return $errorMessage;
}
?>