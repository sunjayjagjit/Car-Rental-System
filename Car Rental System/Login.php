<?php include("connection.php"); ?>

<style>

#top
{
	width:66%;
	border:2px solid;
	background-color: gray;
	border-color: gray;
	padding:2px;
	margin:1px;
	float: center;
	margin: 0 auto;
	overflow: auto;
	border-radius: 10px;
	font-family: calibri;
	margin-bottom: 70;
}

#navi ul
{
	list-style:none;
}

#navi a:link
{
	text-decoration:none;
	display;block;
	color:white;
	font-size:1.00em;
	float: left;
	padding: 10px;
	padding-top: 0px;
	text-align:center;
}

#navi a:visited
{
	color:white;
}

#navi li
{
	display:inline;
}

</style>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="LoginStyle.css">
</head>
<body>


<div id="top">
 <div id="navi">
 <ul>
    <li><a href="Home2.php">Home</a></li>
	<li><a href="Register.php">Register</a></li>
 </ul>
</div>
</div>


<div id="wrapper">
<h2>User Login</h2><br/>
	
<form method="post">
<fieldset>
<table>

<tr>
	<td align="left">Username:</td>
	<td align="left"><input type="text" name="username" /></td>
</tr>

<tr>
	<td align="left">Password:</td>
	<td align="left"><input type="password" name="password" /></td>
</tr>

</table>
</fieldset>

<br/><input type="submit" name="BtnLogin" value="login">


</form><br/>

</div>
 
</body>
</html>

<?php

if(isset($_POST["BtnLogin"]))

		
	{
	$username = $_POST["username"];
	$password = $_POST["password"];
	$check_user = mysqli_query($conn,"select * from `user` where user_password = '$password' and user_username = '$username'");

   if ($row=mysqli_fetch_assoc($check_user))   {

   		$_SESSION["aid"]=$row["user_id"];
   		header("location: Home.php");		

   }
   else
   {
   	?>
   			<script type="text/javascript">
   				alert("invalid Username or Password")
   			</script>

   			<?php
   			}


}
?>