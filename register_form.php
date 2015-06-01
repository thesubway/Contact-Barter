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
<script>
function validateForm() 
{
    var x = document.forms["register"]["firstName"].value;
    if (x == null || x == "")
		{
        alert("First Name must be filled out");
        exit();
        return false;
		}
		
		
		var Y = document.forms["register"]["lastName"].value;
    if (y == null || y == "")
		{
        alert("Last Name must be filled out");
        exit();
        return false;
		}
		
	
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(register.emailAddress.value))  
  {  
    return (true)  
  }  
    alert("You have entered an invalid email address!") ;
    exit();
    return (false)  
	
	 
}
</script>

<title>Contact Barter</title>
<link rel="stylesheet" type="text/css" href="mycss.css"/>
</head>

<body>
<div id="regmain">
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


<div id="contactarea">
<form name = "register" method="post" onsubmit="validateForm()">
<br>
<br>
<br>
<br>
*FIRST NAME: <input type="text" name = "firstName" >
<br><br>
*LAST NAME: <input type="text" name = "lastName" >
<br><br>
*EMAIL ADDRESS: <input type="text" name = "emailAddress" >
<br><br>
*USERNAME: <input type="text" name = "userName" >
<br><br>
<!-- The following input box accepts password hence type should be “password” but for
simplicity we assume it as basic “text” field -->
*PASSWORD: <input type="password" name = "password" >
<br><br>
<input type = "submit" value = "submit">
</form>
</div>
</div>
</body>

</html>