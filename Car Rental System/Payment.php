<?php
include ("connection.php")

?>

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
	text-align: center;
}

td{
background-color: #E0E0E0;
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
<fieldset>



							
							
							
<?php

		

$run = mysqli_query($conn,"SELECT * from booking where user_id = '$aid'");

while ($row=mysqli_fetch_array($run))
{
  
  $bc = $row["booking_carquantity"];
  $pl = $row["booking_pickuplocation"];
  $pd = $row["booking_pickupdate"];
  $pt = $row["booking_days"];
  $dl = $row["booking_dropofflocation"];
  $gt = $row["grandtotal"];
?>

<h2>Payment</h2>

<form action="Payment2.php" method="post" name="frm">
<label>Car Quantity : <?php echo $bc; ?></label><br/><br/>

<p class="thicker">Pick-up Date & Location : </p>
<ul>
        <li><a>Pick-up Location : <br/><?php echo $pl; ?></a></li><br/>
         <li><a>Pick-up Date : <?php echo $pd; ?></a></li><br/>
		 <li><a>Days : <?php echo $pt; ?></a></li><br/>
</ul>
<p class="thicker">Return Date & Location : </p>
<ul>
        <li><a>Drop-off Location : <br/><?php echo $dl; ?><br/><br/>
</ul>

<label>Grand Total : <?php echo $gt; ?></a></label><br/><br/>
<?php } ?>

<p>Please pay using either one of this Bank: <br/>
Maybank2U - <b>2387492384234</b> <br/>
CIMBClicks - <b>9237402934720</b> <br/>
RHB Now - <b>2923874018374</b> <br/>
PBe - <b>293874203974</b> <br/>
</p>

</fieldset>
<button onclick="goBack()" style="margin-left:400px;margin-bottom:20px;">Back</button>
<a type="submit "value="Add" name="addbtn"><button>Proceed</button><a>
</form><br/>


</fieldset>
</div>



<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
</body>

</html>

<?php
							}	

						?>