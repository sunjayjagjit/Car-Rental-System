<?php include("connection.php"); ?>
<!DOCTYPE html>

<html>

<head>
	<title>Home</title>
<style>
html
{
	background-image: url("BG03.jpg");
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

<?php
$aid = $_SESSION["aid"];
if(!isset($aid)) 
{
header("Location: Login.php");  
}
else
{
$query = mysqli_query($conn,"select * from user where user_id = $aid");
$row = mysqli_fetch_assoc($query);	

?>

<div id="top">
 <div id="navi">
 <ul>
    <li><a href="Home.php">Home</a></li>
	<li><a href="User Profile.php">Profile</a></li>
    <li><a href="Car List.php">Car List</a></li>
	
	<li><a href="Rental History.php">Rental History</a></li>
	<li><a href="Feedback.php">Feedback</a></li>
	<li><a href="Logout.php">Log Out</a></li>
 </ul>
</div>
</div>

<div id="page">
<table border="0" height="400" width="700" style="margin-left:100px;">
<tr>
	<td rowspan="5">
		<h2>Edit User<h2>
		<img src="admin.png" height="250" width="250"/>
	</td>
	<td> </td>
</tr>



<tr>
	<td rowspan="3">
	<form name="editform" method="post" action="">		
				<table border="1">
				 <p>Username 	:	<input type="text" size = "70" style="text-align:center" name="name" value="<?php echo $row['user_username']; ?>" />
				<p>Password	    :	<input type="password" size = "70" style="text-align:center" name="pass" value="<?php echo $row['user_password']; ?>" />
				<p>Email        :	<input type="text" size = "70" style="text-align:center" name="email" value="<?php echo $row['user_email']; ?>" />
				<p>Contact Number:	<input type="text" size = "70" style="text-align:center" name="contact" value="<?php echo $row['user_contactnumber']; ?>" />
				<p><center><input type="submit" name="updatebtn" value="Update Now" /></center></p>
				
					
				</table>
		</form>
		
	
</table>

</div>

<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>

</body>
<?php } ?>
</html>


<?php
if (isset($_POST["updatebtn"]))
{
	$name = $_POST["name"];
	$pass = $_POST["pass"];
	$email = $_POST["email"];
	$contact = $_POST["contact"];


	mysqli_query($conn,"update user set user_username='$name',user_password='$pass',user_email='$email',user_contactnumber='$contact'
	where user_id=$aid");

	header("Location: User profile.php");

}

?>