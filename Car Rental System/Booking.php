<?php include("connection.php"); 

extract($_POST);
$_SESSION["cm"] = $_POST["carlist_model"]; 
$_SESSION["cr"]= $_POST["carlist_rentalprice"];
$_SESSION["ci"]= $_POST["carlist_image"];

?>
<!DOCTYPE html>
<html>

<head>
	<title>Booking</title>
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
padding-top: 30;
}

h2
{
text-align: center;
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
$_SESSION["ppric"] = $row["user_id"];
?>

<?PHP
				extract($_SESSION);
					
					$cmm = $_SESSION["cm"];
					$crr = $_SESSION["cr"];
					$cii = $_SESSION["ci"];
					
					
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

<h2>Booking</h2>

<p> <b>Your ID is:</b> <?php echo $row['user_id'];
							$_SESSION["idid"] = $row['user_id'];	
										
				?></p>
				
<p><?php echo $cmm ?></p>
<p>The car pricing start at RM<?php echo $crr; ?> per day</p>

<?php echo '<class="mousehoverpicture"><img src="photos/'. $cii .'" style="width:480px;height:360px" onclick="location.href=\'photos/'. $cii .'\'" /></>' ?>

<form action="bk.php" method="post" name="frm" >

<a>Your ID : <input name="xxxx" type="number" value="<?php echo $row['user_id'];
							$_SESSION["idid"] = $row['user_id'];	
										
				?>" disabled></a></li> <a><input name="bvnm" type="number" value="<?php echo $row['user_id'];
							$_SESSION["idid"] = $row['user_id'];	
										
				?>" hidden></a></li><br/><br/>

 <a>Car Price : <input name="xxx" type="number" value="<?php echo $crr; ?>" disabled></a></li> <a><input name="pcv" type="number" value="<?php echo $crr; ?>" hidden></a></li><br/><br/>

 <a><input name="final" type="hidden" value="0" disabled></a><br>

<label>Car Quantity :</label>
	<select name="qty1">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select><br/><br/>
	
	<label>Special Request :</label>
	<select name="spc">
	<?php
$run = mysqli_query($conn,"SELECT * from special");

while ($row=mysqli_fetch_array($run))
{
  
  $nm = $row["sp_name"];
  $pr = $row["sp_price"];
?>
		<option value="<?php echo $pr ?>"><?php echo $nm ?> +RM<?php echo $pr ?></option>
		<?php } ?>
	</select><br/><br/>

	
	<p><b>IMPORTANT:</b> To arrange another place other then listed please refer to admin at <u>ccradmin@ccr.com.my</u></p>
	
<p class="thicker">Pick-up Date & Location : </p>
<ul>
        <li><a>Pick-up Location : <select name="pul">
  <option value="Multimedia University">MMU Cyberjaya</option>
  <option value="Cyberia">Cyberia</option>
  <option value="Shaftsbury">Shaftsbury</option>
  <option value="DePulze">DePulze</option>
  <option value="Lim Kok Wing University">Lim Kok Wing University</option>
  <option value="University Islam Malaysia">University Islam Malaysia</option>
  <option value="University College of Medical Science">University College of Medical Science</option>
  <option value="Putrajaya Central">Putrajaya Central</option>
  <option value="Alamanda Shopping">Alamanda Shopping</option>
  </select></a></li><br/>
         <li><a>Pick-up Date : <input name="date1" type="date"/></a></li><br/>
         <li><a>How many days? : <input name="days" type="number"></a></li><br/>
		 
</ul>
<p class="thicker">Return Date & Location : </p>
<ul>
        <li><a>Drop-off Location : <select name="dol">
  <option value="Multimedia University">MMU Cyberjaya</option>
  <option value="Cyberia">Cyberia</option>
  <option value="Shaftsbury">Shaftsbury</option>
  <option value="DePulze">DePulze</option>
  <option value="Lim Kok Wing University">Lim Kok Wing University</option>
  <option value="University Islam Malaysia">University Islam Malaysia</option>
  <option value="University College of Medical Science">University College of Medical Science</option>
  <option value="Putrajaya Central">Putrajaya Central</option>
  <option value="Alamanda Shopping"></option>
  </select></a></li><br/>
    
    <p><b>IMPORTANT:</b> To arrange time on <b>picking up</b> and <b>dropping off</b> please contact <u>ccradmin@ccr.com.my</u> to make an arrangement!</p>
		
</ul>

<a href="Payment.php "style="padding-left:120px;" target="_parent"><input type="submit" value="confirm" name="submitbtn"/></a>
<input type="reset" name="button reset" value="Reset" />

</form>


</fieldset>
</div>


<div id="bottom">
<footer>Copyrights, CyberCarRent (CCR)</footer>
</div>
</body>

</html>




<?php } ?>