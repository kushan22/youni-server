<?php
	
	include('dbConnect.php');

	$email = $_GET['email'];
	$playlistid = $_GET['playlistid'];

	$query = "SELECT state FROM `mycourses` WHERE user='$email' AND playlistid='$playlistid'";

		$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		
		$response = array();
	   if(mysqli_num_rows($result) > 0 ){
			
			$response['state'] = $row['state'];	
			echo json_encode($response);
		}
		else{

			
			    $response['state'] = "404";
			    echo json_encode($response);
				 
		}
//


?>