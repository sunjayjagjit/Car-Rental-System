<?php include("conn.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Edit Car</title>

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

#table2
{
	padding-left:0px;
	padding-top: 20px;
	padding-bottom: 30px;
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

<h2>Edit Car</h2>

<div id="table">
<table border="1" width="800">

<tr>
	<th>Image</th>
	<th>Model</th>
	<th>Price</th>
	<th>Capacity</th>
	<th>Edit</th>
	
</tr>

<?php
$run = mysqli_query($con,"SELECT * from carlist");

while ($row=mysqli_fetch_array($run))
{ 
  $cm = $row["carlist_model"];
  $cr = $row["carlist_rentalprice"];
  $cv = $row["carlist_seatingcapacity"];
?>

<tr>
<td><?php echo '<class="mousehoverpicture"><img src="photos/'. $row['carlist_image'] .'" style="width:100px;height:100px" onclick="location.href=\'photos/'. $row['carlist_image'] .'\'" /></>' ?></td>

	<td><?php echo $cm; ?></td>
	<td><?php echo $cr; ?></td>
	<td><?php echo $cv; ?></td>
	<td>
					<form method="post"> 
					<input type="hidden" name="id1" id="id1" value="<?php echo $row["carlist_id"];?>">
					<center><input type="submit" name="delete" value="delete"></center>
					</form>
					</td>

		
</tr>

<?php } ?>

</table>


<h2>Edit Special</h2>

<div id="table2">
<table border="1" width="800">

<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Price</th>
	<th>Edit</th>

	
</tr>

<?php
$run = mysqli_query($con,"SELECT * from special");

while ($row=mysqli_fetch_array($run))
{ 
  $idd = $row["sp_id"];
  $snn = $row["sp_name"];
  $spp = $row["sp_price"];
?>


	<td><?php echo $idd; ?></td>
	<td><?php echo $snn; ?></td>
	<td><?php echo $spp; ?></td>
	<td>
					<form method="post"> 
					<input type="hidden" name="id2" id="id2" value="<?php echo $row["sp_id"];?>">
					<center><input type="submit" name="delete" value="delete"></center>
					</form>
					</td>

		
</tr>

<?php } ?>

</table>
</div>
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
	$id= $_POST["id1"];
?>
<script> var del=confirm("Are you sure you want to delete this record??!!");
	if (del==true)
	{
		<?php
		mysqli_query($con,"delete from carlist where carlist_id= '$id'");
		?>
		alert ("record deleted")
		window.location.href='editcar1.php';
	}
</script>
<?php
}
?>

<?php
if (isset($_POST["delete"]))
{
	$id= $_POST["id2"];
?>
<script> var del=confirm("Are you sure you want to delete this record??!!");
	if (del==true)
	{
		<?php
		mysqli_query($con,"delete from special where sp_id= '$id'");
		?>
		alert ("record deleted")
		window.location.href='editcar1.php';
	}
</script>
<?php
}
?>

<?php
							}	

						?>
