<?php
include("connection.php"); 

 if(isset($_POST["submitbtn"]))
 {
	 $bvnm = $_POST["bvnm"];
	 $pcv = $_POST["pcv"];
	 $qty1 = $_POST["qty1"];
	 $spc = $_POST["spc"];
	 $pul = $_POST{"pul"};
	 $date1 =$_POST{"date1"};
	 $days =$_POST{"days"};
	 $dol =$_POST{"dol"};
	 $final =$_POST{"final"};
	 $final =($pcv*$qty1*$days+$spc);
	 

	 
	mysqli_query($conn,"insert into booking(user_id,cptipu,booking_carquantity,money_extra,booking_pickuplocation,booking_pickupdate, booking_days, booking_dropofflocation, grandtotal)
	values('$bvnm','$pcv','$qty1','$spc','$pul','$date1','$days','$dol','$final')");
        header("location: Payment.php");
			exit();	
         
  } 
 

//echo $qty.$sr.$pul.$date.$time.$dol.$dod.$dot

?>