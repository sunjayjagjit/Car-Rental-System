<?php 

include("connection.php"); 


if(isset($_POST["submitbtn"]))
	{
		
		$bgh = $_POST["bgh"];
		$file =$_FILES["image"]["name"];
		$pd = $_POST["paydate"];
		$pt = $_POST["paytime"];
		$ty = $_POST["type"];
		$dp = $_POST["deposit"];
		$rf = $_POST["ref"];
			

		mysqli_query($conn,"insert into payment(user_id, payment_date,payment_time,payment_banktype,payment_amountdeposit,payment_referenceid,payment_attachment) 
		values('$bgh','$pd','$pt','$ty','$dp','$rf','$file')");
		
							 if ($file!=null) {
			
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["image"]["name"]);
			//echo $temp;
			$extension = end($temp);
			if ((($_FILES["image"]["type"] == "image/gif")
			|| ($_FILES["image"]["type"] == "image/jpeg")
			|| ($_FILES["image"]["type"] == "image/jpg")
			|| ($_FILES["image"]["type"] == "image/png"))
			&& ($_FILES["image"]["size"] < 1000000)
			&& in_array($extension, $allowedExts));
			if ($_FILES["image"]["error"] > 0)
				
				{
					
					echo "<font style='text-align:center;color:red'>" . $_FILES["image"]["error"] . "!</font>";	
					
				}
				else
				{						
					move_uploaded_file($_FILES["image"]["tmp_name"],	"photos/" . $_FILES["image"]["name"]);
					$fileName = $_FILES["image"]["name"];
					//INSERT RECORD	
					$mid =(isset($_SESSION['mid']) ? $_SESSION['mid'] : null);
					$query="insert into payment values(null,'$mid','$fileName')";				
					
									
				}	
	
	}
			

		header("location: Rental History.php");
			exit();	
	}


?>
   			<script type="text/javascript">
   				alert("Your feedback has been sent! Thank You")
   			</script>
