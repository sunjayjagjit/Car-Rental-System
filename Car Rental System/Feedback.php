<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>

<head>
<title>Feedback</title>
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
	height:40px;
	border:2px solid;
	border-color: gray;
	background-color:gray;
	padding:2px;
	margin:1px;
	float: center;
	margin: 0 auto;
	overflow: auto;
	border-radius: 10px;
}

#home
{
	width:356px;
	height:356x;
	border-color:black;
	padding:20px;
	float:center;
	margin-left: 248px;
	margin-top: 20px;
}

label
{
  width:150px;
  font-family:arial;
  font-weight:bold;
  color:black;
  font-size:0.95em;
  text-align:left;
  float:center;
  margin-right:10px;  
}

input:focus , textarea:focus
{
   border:1px silver solid;
   background-color:gray;
   color:white;
}

input[type="submit"]
{
	width:100px;
	border-radius:10px;
}
	
input[type="reset"]
{
	width:100px;
	border-radius:10px;
}

h2
{
	padding-left: 350px;
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

input[type="submit"]:hover{background-color:white; color:green;}
input[type="reset"]:hover{background-color:white; color:green;}

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

<h2>Customer's Feedback</h2>

<fieldset id="home">

<form method="post" name="frm" >
<label>Name :</label>
	<input type="Text" name="name" size="36" maxlength="30" required/><br><br>
	
<label>Email :</label>
	<input type="email" size="36" size="40" maxlength="90" name="email"/><br><br>
	
<label>Feedback Type :</label>
	<select name="type">
		<option value="1 - Complaint">Complaint</option>
		<option value="2 - Recommendation">Recommendation</option>
	</select><br/><br/>
<label>Comments :</label>
<Textarea name="comm" cols="30" rows="5"></textarea></p>

	<p><b>Service Rating : </b>
	<input type="radio" name="rate" value="1"/> 1
	<input type="radio" name="rate" value="2"/> 2
	<input type="radio" name="rate" value="3"/> 3
	<input type="radio" name="rate" value="4"/> 4
	<input type="radio" name="rate" value="5"/> 5
	</p>


<p style="text-align:center"><input type="submit" name="submitbtn" value="Send" />
<style="text-align:center"/><input type="reset" name="resetbtn" value="Clear Form" /></p>
 
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
		$name = $_POST["name"];
		$email = $_POST["email"];
		$type = $_POST["type"];
		$comm = $_POST["comm"];
		$rate = $_POST["rate"];
			
		mysqli_query($conn,"insert into feedback(feedback_email,feedback_name, feedback_type, feedback_comment, feedback_servicerating) values('$email','$name','$type','$comm','$rate')");
?>
   			<script type="text/javascript">
   				alert("Your feedback has been sent! Thank You")
   			</script>
<?php
		mysqli_close($conn);		
	}


?>

<?php
							}	

						?>