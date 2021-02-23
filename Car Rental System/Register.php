<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="RegisterStyle.css">
</head>

<body>

<div id="top">
 <div id="navi">
 <ul>
    <li><a href="Home2.php">Home</a></li>
	<li><a href="Login.php">Login</a></li>
 </ul>
</div>
</div>

<fieldset id="fs">
<form name="register" method="post">
<div id="register">
	<h2>Registration Form</h2>
	<p>
	<label>Username : </label>
	<input class="fbg" type="Text" name="username" size="30" maxlength="20" placeholder="John" required/>
	</p>
	
	<p>
	<label>Password : </label>
	<input class="fbg" name="pass" type="password" size="30" maxlength="8" id="password" placeholder="Password..." required>
	</p>

	<p>
	<label>Email : </label>
	<input class="fbg" type="text" size="30" maxlength="20" name="email" placeholder="exsmple@gmail.com" required>
	</p>
	
	<p>
	<label>Contact Number: </label>
	<input class="fbg" type="tel" name="contactnumber" size="30" maxlength="20" placeholder="+6010-1234567" required>
	</p>
	
	<p class="btn">
	<input type="submit" name="submitbtn" value="Register"/>
	<input type="reset" name="resetbtn" value="Clear Form"/>
	</p>	
</form>
</fieldset>
</div>
	
<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
	
</body>

</html>

<?php

if(isset($_POST["submitbtn"]))
{
	$name = $_POST["username"];
	$pass = $_POST["pass"];
	$email = $_POST["email"];
	$cont = $_POST["contactnumber"];
		
	mysqli_query($conn,"insert into user(user_username, user_email, user_password, user_contactnumber) values('$name','$email','$pass','$cont')");
	header("location: Login.php");
	mysqli_close($conn);		
}
?>