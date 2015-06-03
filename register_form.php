<?php

//include the files
require_once 'function_register.php';
require_once 'database.php';
$errorMessage = '&nbsp;';
if (isset($_POST['userName'])) {
$result = doRegister();
if ($result != '') {
$errorMessage = $result;
echo "<script>alert('".$errorMessage."');</script>";
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

<title>Register Form</title>
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
<br>
<h2>Register Form</h2>
<div id="contactarea">
<form name = "register" method="post" onsubmit="validateForm()">
<br>
*All fields are required.
<br>
<br>
*FIRST NAME: <input type="text" name = "firstName" value = "<?php echo $_POST['firstName']; ?>">
<br><br>
*LAST NAME: <input type="text" name = "lastName" value = "<?php echo $_POST['lastName']; ?>">
<br><br>
*EMAIL ADDRESS: <input type="text" name = "emailAddress" value = "<?php echo $_POST['emailAddress']; ?>">
<br><br>
*USERNAME: <input type="text" name = "userName" value = "<?php echo $_POST['userName']; ?>">
<br><br>
<!-- The following input box accepts password hence type should be “password” but for
simplicity we assume it as basic “text” field -->
*PASSWORD: <input type="password" name = "password">
<br><br>
*BIOGRAPHY: <input type="text" name = "biography" value = "<?php echo $_POST['biography']; ?>">
<br><br>
*EXPERTISE: <input type="text" name = "expertiseIn" value = "<?php echo $_POST['expertiseIn']; ?>">
<br><br>
*LOOKING FOR: <input type="text" name = "lookingFor" value = "<?php echo $_POST['lookingFor']; ?>">
<br><br>
*CONTACT DETAILS: <input type="text" name = "contactDetails" value = "<?php echo $_POST['contactDetails']; ?>">
<br><br>
<input type = "submit" value = "submit">
</form>
</div>
</div>

<div id="footer">
	
	<h5>Copyright &copy 2015,designed by <a href="#123" style="color: #E00000"> Barter</a> | <a href="#123" style="color: #E00000"> Privacy Policy</a></h5>
</div>
</body>

</html>