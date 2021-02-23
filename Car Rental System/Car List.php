<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
<title>Car List</title>
<link rel="stylesheet" type="text/css" href="CarlistStyle.css">
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



<table border="1" width="800">

<tr>
	<th>Car ID</th>
	<th>Car Image</th>
	<th>Car Name</th>
	<th>Seat</th>
	<th>Price</th>
	<th>Book Now</th>
</tr>

<?php

		

$run = mysqli_query($conn,"SELECT * from carlist");

while ($row=mysqli_fetch_array($run))
{
  
  $ci = $row["carlist_id"];
  $cm = $row["carlist_model"];
  $cs = $row["carlist_seatingcapacity"];
  $cr = $row["carlist_rentalprice"];
?>

<tr align="center">
	<td><?php echo $ci; ?></td>
	<td><?php echo '<class="mousehoverpicture"><img src="photos/'. $row['carlist_image'] .'" style="width:100px;height:100px" onclick="location.href=\'photos/'. $row['carlist_image'] .'\'" /></>' ?></td>
	<td><?php echo $cm; ?></td>
	<td><?php echo $cs; ?></td>
	<td><?php echo $cr; ?></td>
	   <td> <form method = "post" action = "Booking.php">
						
						<input type="hidden" name="carlist_model" value="<?php echo $row["carlist_model"]; ?>"> 
			
						<input type="hidden" name="carlist_rentalprice" value="<?php echo $row["carlist_rentalprice"]; ?>"> 
						
						<input type="hidden" name="carlist_image" value="<?php echo $row["carlist_image"]; ?>">
						
						
						<center><input type="submit" name="Book" value="Book"></center>
						
						</form>
						</td>

<?php } ?>

</table>

</div>

<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
</body>

</html>


<?php
							}	

						?>