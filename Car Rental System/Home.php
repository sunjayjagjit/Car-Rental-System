<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Homepage</title>
<style>

html
{
	background-image: url("BG03.jpg");
	background-attachment: fixed;
	font-family: calibri;
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


#wallpaper
{
	width: 63.7%;
	border-width: 1px;
	border-color: white;
	border-radius: 10px;
	border-style: solid;
	padding-left: 20px;
	padding-bottom: 20px;
	padding-right: 20px;
	padding-top: 20px;
	float: center;
	margin: 0 auto;
	overflow: auto;
	background-color: white;
	font-family: calibri;
}



marquee{
margin-top:20px;

}
#page-wrapper
{
	width: 63.7%;
	border-width: 1px;
	border-color: #E0E0E0;
	border-radius: 10px;
	border-style: solid;
	padding-left: 20px;
	padding-bottom: 20px;
	padding-right: 20px;
	padding-top: 20px;
	float: center;
	margin: 0 auto;
	overflow: auto;
	background-color: #E0E0E0;
	font-family: calibri;
}
footer
{
text-align:center;}


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




</style>
<head>
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
<div id="page-wrapper">
<div id="conainer">
<marquee behavior="scroll" direction="left" scrollamount="10">
<img src="Alza.jpg" height="360px" width="480px">
<img src="Myvi.jpg" height="360px" width="480px">
<img src="Axia.jpg" height="360px" width="480px">

</marquee>
</div>
</div>
</div>

<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
</html>
</body>
</html>

<?php
							}	

						?>