
<?php include("conn.php"); 

 if(isset($_POST["submitbtn2"]))
 {

 	$nm = $_POST["nm"];
 	$pc = $_POST["pc"];

 	

 	mysqli_query($con,"insert into special(sp_name,sp_price) 
 	values ('$nm','$pc')");
 	mysqli_close($con);

  			

	header("location: Edit Car2.php");
			exit();	

}
?>
