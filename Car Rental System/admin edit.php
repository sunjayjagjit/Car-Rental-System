<?php include("conn.php"); 
?>

<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
<style>
html
{
	background-image: url("BG01.jpg");
	background-attachment: fixed;
	font-family: calibri;
}

#page
{
	border: 0;
	width:700px;
	border-radius:10px;
	float:center;
	background-color: #E0E0E0;
	margin:0 auto;
	overflow:auto;
	padding-top: 20px;
	padding-right: 200px;
	height: 600px;
	opacity: 0.8;
}

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
}

#navi a:visited
{
	color:white;
}

#navi li
{
	display:inline;
}

#bottom
{
	width:66%;
	height:30px;
	border:2px solid;
	border-color: gray;
	background-color:gray;
	padding:2px;
	margin:1px;
	float: center;
	margin: 0 auto;
	overflow: auto;
	border-radius: 10px;
	text-align:center;
	padding-top:10px;
}

#picture
{
	text-align:left;float:left;
	opacity:1;
}
	
	
td
{
	font-family:Verdana;
	text-align:left;
}
  
 h2
{
	text-shadow: 2px 2px red;
	text-align:center; 
	overflow: auto; 
 
 ul li a:hover
{
	display: block;
	border-radius:5px;
	background: black;
}

td
{
	width:150px;
	height:30px;	
	font-family:arial;
	font-weight:bold;
	color:black;
	font-size:0.80em;
	text-align:left;
	float:center;
	margin-right:10px;  
	margin-bottom:80px;  
}

#page table
{
	padding-left: 130px;
}




</style>

<body>

	<body>
	<?php
	$aid = $_SESSION["aid"];
	if(!isset($aid)) 
	{
	header("Location: ADLogin.php");  
	}
	else
	{
	$query = mysqli_query($con,"select * from admin where admin_id = $aid");
	$row = mysqli_fetch_assoc($query);	

	?>

<div id="top">
 <div id="navi">
 <ul>
	<li><a href="adminprofile.php">Home</a></li>
	<li><a href="editcar1.php">Edit Car</a></li>
    <li><a href="Edit Car2.php">Add Car</a></li>
	<li><a href="Registered User.php">Registered User</a></li>
	<li><a href="ADBooking.php">Booking</a></li>
    <li><a href="ADPayment.php">Payment</a></li>
	<li><a href="adminfeedback.php">Feedback</a></li>
	<li><a href="ADLogout.php">Log Out</a></li>
 </ul>
</div>
</div>

<div id="page">
<table border="0" height="400" width="700" style="margin-left:100px;">
<tr>
	<td rowspan="5">
		<h2>ROGER<h2>
		<img src="admin.png" height="250" width="250"/>
	</td>
	<td> </td>
</tr>

<tr>
	<td rowspan="3">
	<form name="editfrm" method="post" action="">
		

				<p>Username 	:	<input type="text" size = "70" style="text-align:center" name="aname" value="<?php echo $row['admin_username']; ?>" />
				<p>Password	    :	<input type="password" size = "70" style="text-align:center" name="apass" value="<?php echo $row['admin_password']; ?>" />
				<p>Email        :	<input type="text" size = "70" style="text-align:center" name="aemail" value="<?php echo $row['admin_email']; ?>" />
				<p><center><input type="submit" name="updatebtn" value="Update Now" /></center></p>
				

					
				
					
						
				</table>
		</form>
		
	</td>
</tr>

<tr>
</tr>

<tr>

</tr>

<tr>
	<td> </td>
</tr>
</table>
</div>

<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>

</body>

</html

<?php
if (isset($_POST["updatebtn"]))
{
	$aname = $_POST["aname"];
	$apass = $_POST["apass"];
	$aemail = $_POST["aemail"];


	mysqli_query($con,"update admin set admin_username='$aname',admin_password='$apass',admin_email='$aemail'
	where admin_id=$aid");

	header("Location: adminprofile.php");

}
}
?>
