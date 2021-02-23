<?php include("conn.php");


?>


<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="LoginStyle1.css">
</head>
<body>

<div id="wrapper">
<h2>Admin Login</h2><br/>
	
<form  method="post">
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
	$usrname = $_POST["username"];
	$psswrd = $_POST["password"];
	
	$check_admin = mysqli_query($con,"select * from admin where admin_username = '$usrname' and admin_password = '$psswrd'");

   if ($row=mysqli_fetch_assoc($check_admin))   {

   		$_SESSION["aid"]=$row["admin_id"];
        //echo $_SESSION["aid"];
   		header("location: adminprofile.php");

   		


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

