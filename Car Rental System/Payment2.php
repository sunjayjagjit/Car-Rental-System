<?php include("connection.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Payment</title>
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
	float: center;
	text-align:center;
	padding-top:10px;
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
}

fieldset
{
	margin-left: 200px;
	margin-bottom: 20px;
	border: 0;
}

img
{
	margin-left: 40px;
	border-width: 1px;
	border-style: solid;
	border-color: gray;
	border-radius: 5px;
}

form
{
padding-left: 50px;
}

h2
{
	padding-left: 400px;
}

td{
background-color: #E0E0E0;
}

table
{
	margin-left: 270px;
}

button
{
margin-left: 420px;
margin-bottom: 20px;
margin-top: 10px;
}
</style>
	
</head>

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
<table border="0">

<h2>Payment</h2>

<?php $query = mysqli_query($conn,"select * from user where user_id = '$aid'");
$row = mysqli_fetch_assoc($query);	
$_SESSION["ppric"] = $row["user_id"];
?>


							
							
			
<form action='PSS.php' method='POST' enctype='multipart/form-data' name='frm'>

			<tr>
			<td><input name="bgh" type="number" value="<?php echo $row['user_id'];
							$_SESSION["idid"] = $row['user_id'];	
										
				?>" hidden></a></li><br/><br/></td>
			</tr>
			<tr>
			<td><label>Payment Date : </label></td>
			<td><input type="date" name="paydate" size="30" maxlength="20" placeholder="09/09/2015" required/></td>
			</tr>
			
			<tr>
			<td><label>Payment Time: </label></td>
			<td><input type="time" name="paytime" size="30" maxlength="20" placeholder="8.20 AM" required/></td>
			</tr>
			
			<tr>
			<td>Bank Type : </td>
			<td><input type="Text" name="type" size="30" maxlength="20" placeholder="Maybank2u"/></td>
			</tr>
			
			<tr>
			<td><label>Amount Paid : </label></td>
			<td><input type="Text" name="deposit" size="30" maxlength="20" placeholder="RM50" required/></td>
			</tr>
			
			<tr>
			<td><label>Reference ID : </label></td>
			<td><input type="Text" name="ref" size="30" maxlength="20" placeholder="112112289550" required/></td>
			</tr>
			
			<tr>
			<td>Attachment :</td>
			<td><input type="file" name="image" id="filetoupload" required ></td>
			</tr>	

</table>

<p style="text-align:center"><input type="submit" value="confirm" name="submitbtn"/>
<style="text-align:center"/><input type="reset" name="resetbtn" value="Clear Form" /></p>

<style="text-align:center"/></p>
</form>
</div>

<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
</body>

</html>


<?php } ?>