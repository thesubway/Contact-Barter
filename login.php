<?php
//Mallika's php:
//include the files
require_once 'functions.php';
require_once 'database.php';
$errorMessage = '&nbsp;';
if (isset($_POST['userName'])) {
$result = doLogin();
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
<form name = "login" method="post">
USERNAME <input type="text" name = "userName" >
<br>
<!-- The following input box accepts password hence type should be “password” but for
simplicity we assume it as basic “text” field -->
PASSWORD <input type="text" name = "password" >
<input type = "submit" value = "submit">
</form>
</body>
</html>