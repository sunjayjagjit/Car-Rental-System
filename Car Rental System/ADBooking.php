<?php
include ("conn.php");
?>






<html>
<head>
	<title>Booking</title>

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
	margin-left: 410px;
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

<h2>Booking</h2>

<div id="table">
<table border="1" width="800">

<tr>
	<th>Id</th>
	<th>Car Quantity</th>
	<th>Pick-up Location</th>
	<th>Pick-up Date</th>
	<th>Days</th>
	<th>Drop-off Location</th>
	<th>Extra</th>

	<th>delete</th>
</tr>

<?php

 $run = mysqli_query($con, "SELECT * from booking");

 while ($row = mysqli_fetch_array($run)){

 	$Id = $row["booking_id"];
 	$CarQuantity = $row["booking_carquantity"];
 	$PickupLocation = $row["booking_pickuplocation"];
 	$Pickupdate = $row ["booking_pickupdate"];
 	$days = $row ["booking_days"];
 	$Dropofflocation = $row ["booking_dropofflocation"];
 	$me = $row ["money_extra"];
?>

<tr align= "center">
	<td><?php echo $Id; ?></td>
	<td><?php echo $CarQuantity; ?></td>
	<td><?php echo $PickupLocation; ?></td>
	<td><?php echo $Pickupdate; ?></td>
	<td><?php echo $days; ?></td>
	<td><?php echo $Dropofflocation; ?></td>
	<td><?php echo $me; ?></td>

	<td>
					<form method="post"> 
					<input type="hidden" name="id" id="id" value="<?php echo $row["booking_id"];?>">
					<center><input type="submit" name="delete" value="delete"></center>
					</form>
					</td>



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

if (isset($_POST["delete"]))
{
	$id= $_POST["id"];
	?>
	
		<script> var del=confirm("Are you sure you want to delete this record??!!");
				if (del==true){
								<?php
								mysqli_query($con,"delete from booking where booking_id= '$id'");
								?>
								alert ("record deleted")
								window.location.href='ADBooking.php';
}
		</script>
		<?php
		}
	}
?>
