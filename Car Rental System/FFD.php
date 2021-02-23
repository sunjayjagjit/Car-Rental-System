<table border="1">

<tr>
	<th>Id</th>
	<th>Days</th>
	<th>Quantity</th>

</tr>

<?php
include ("connection.php")

$aid = $_SESSION["aid"];
if(!isset($aid)) 
{
header("Location: Login.php");  
}
else
{
$query = mysqli_query($conn,"select * from user where user_id = $aid");
$row = mysqli_fetch_assoc($query);	

$run = mysqli_query($conn,"SELECT * from booking");

while ($row=mysqli_fetch_array($run))
{
  
  $id = $row["booking_id"];
  $pt = $row["booking_days"];
  $bc = $row["booking_carquantity"];

?>

<tr align="center">

	<td><?php echo $id; ?></td>
	<td><?php echo $pt;?></td>
	<td><?php echo $bc;?></td>
	
<?php } ?>
</table>