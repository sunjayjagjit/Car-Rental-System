<?php
include ("connection.php")

?>



<!DOCTYPE html>
<html>

<head>
	<title>Purchase History</title>
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
	padding-bottom: 30px;
	padding-right: 200px;
	height: 100%;
	opacity:0.8;
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

#table
{
	padding-left:50px;
	padding-top: 20px;
}

table th
{
	background: #E0E0E0;
}

table td
{
	background: white;
}

h2
{
	margin-left: 360px;
}

#bottom footer
{
	padding-top: 10px;
	padding-left: 350px;
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

<h2>Booking History</h2>

<div id="table">
<table border="1" width="800">

<tr>
	<th>Username /Id</th>
	<th>Car Quantity</th>
	<th>Pick-up Location</th>
	<th>Pick-up Date</th>
	<th>Days</th>
	<th>Drop-off Location</th>
</tr>

<?php

		
$run = mysqli_query($conn,"SELECT * from booking where user_id = '$aid'");

while ($row=mysqli_fetch_array($run))
{
  
  $id = $row["booking_id"];
  $qty = $row["booking_carquantity"];
  $pl = $row["booking_pickuplocation"];
  $pd = $row["booking_pickupdate"];
  $pt = $row["booking_days"];
  $dl = $row["booking_dropofflocation"];
?>

<tr align="center">

	<td><?php echo $id; ?></td>
	<td><?php echo $qty; ?></td>
	<td><?php echo $pl; ?></td>
	<td><?php echo $pd; ?></td>
	<td><?php echo $pt;?></td>
	<td><?php echo $dl; ?></td>


<?php } ?>



</table></div>	

<h2>Payment History</h2>

<div id="table">
<table border="1" width="800">

<tr>
	<th>ID</th>
	<th>Date</th>
	<th>Type</th>
	<th>Reference</th>
	<th>Attachment</th>
	<th>Time</th>
	<th>Amount Paid</th>
	<th>Confirmation</th>
</tr>

<?php

		

$run = mysqli_query($conn,"SELECT * from payment where user_id = '$aid'");

while ($row=mysqli_fetch_array($run))
{
  
  $pi = $row["payment_id"];
  $pd = $row["payment_date"];
  $pb = $row["payment_banktype"];
  $pr = $row["payment_referenceid"];
  
  $pt = $row["payment_time"];
  $pam = $row["payment_amountdeposit"];
?>

<tr align="center">

	<td><?php echo $pi; ?></td>
	<td><?php echo $pd; ?></td>
	<td><?php echo $pb; ?></td>
	<td><?php echo $pr; ?></td>
	<td><?php echo '<class="mousehoverpicture"><img src="photos/'. $row['payment_attachment'] .'" style="width:100px;height:100px" onclick="location.href=\'photos/'. $row['payment_attachment'] .'\'" /></>' ?></td>
	<td><?php echo $pt; ?></td>
	<td><?php echo $pam; ?></td>
	<td>Please check your email after<br> <b>an hour</b> of making the payment.</td>


<?php } ?>

</table>


</div>	  
</div>
<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
</body>

</html>


<?php
							}	

						?>