<?php include("conn.php"); 
?>


<!DOCTYPE html>
<html>

<head>
	<title>Add Car</title>
	<link rel="stylesheet" type="text/css" href="EditCarStyle.css">
</head>

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

<h2>Add Car to Listing</h2>

<form action="ec.php" method="post" name="frm" enctype='multipart/form-data' >

<table border="1">



<tr>
	<th><label>Seating Capacity</label></th>
	<td><input size="49" maxlength="40" placeholder="7" type="text" name="cap"></td>
</tr>

<tr>
	<th><label>Rental Price</label></th>
	<td><input size="49" maxlength="40" placeholder="RM 120" type="text" name="price"></td>
</tr>

<tr>
	<th><label>Model:</label></th>
	<td><input size="49" maxlength="40" placeholder="2015 Perdua Alza" type="text" name="model"></td>
</tr>


<tr>
	<th><label>Car Image :</label></th>
	<td><input type="file" name="image" id="filetoupload" required ></td>
</tr>


	 
</table>

 <p class="btn">
	<input type="submit" name="submitbtn" value="Submit"/>
	<input type="reset" name="resetbtn" value="Clear" />
</p>




</form>

<h2>Add Special</h2>

<form action="srr.php" method="post" name="frm">

<table border="1">



<tr>
	<th><label>Name</label></th>
	<td><input size="49" maxlength="40" placeholder="GPS" type="text" name="nm"></td>
</tr>

<tr>
	<th><label>Price</label></th>
	<td><input size="49" maxlength="40" placeholder="RM 30" type="text" name="pc"></td>
</tr>


	 
</table>

 <p class="btn">
	<input type="submit" name="submitbtn2" value="Submit"/>
	<input type="reset" name="resetbtn" value="Clear" />
</p>




</form>

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