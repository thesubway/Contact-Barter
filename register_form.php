<?php

//include the files
require_once 'function_register.php';
require_once 'database.php';
$errorMessage = '&nbsp;';
if (isset($_POST['userName'])) {
$result = doRegister();
if ($result != '') {
$errorMessage = $result;
}
}
?>
<html>
<head>
<title> Welcome User </title>
</head>
<body>
<form name = "register" method="post">
FIRST NAME <input type="text" name = "firstName" >
<br>
LAST NAME <input type="text" name = "lastName" >
<br>
EMAIL ADDRESS <input type="text" name = "emailAddress" >
<br>
USERNAME <input type="text" name = "userName" >
<br>
<!-- The following input box accepts password hence type should be “password” but for
simplicity we assume it as basic “text” field -->
PASSWORD <input type="text" name = "password" >
<input type = "submit" value = "submit">
</form>
</body>
</html>