
<?php include("conn.php"); 

 if(isset($_POST["submitbtn"]))
 {

 	$file =$_FILES["image"]["name"];
 	$sc = $_POST["cap"];
 	$rp = $_POST["price"];
 	$cm = $_POST["model"];
 	
 	

 	mysqli_query($con,"insert into carlist(carlist_seatingcapacity,carlist_rentalprice,carlist_model, carlist_image) 
 	values ('$sc','$rp','$cm','$file')");
 	
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
					$query="insert into carlist values(null,'$mid','$fileName')";				
					
									
				}	
	
	}
			

  			

	header("location: editcar1.php");
			exit();	

}
?>
<script type="text/javascript">
   				alert("Car Added to listing")
   			</script>