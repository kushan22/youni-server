<?php

include('dbConnect.php');
$email = $_GET['email'];
$state = "completed";

$query = "SELECT course_name FROM `mycourses` WHERE user ='$email' AND state='$state'";

//$coursesquery= $conn->query($query);
	
	$result=mysqli_query($conn,$query);
	
		
		$reponse = array();
	   if(mysqli_num_rows($result) > 0 ){
			$coursesquery= $conn->query($query);

			  while ($row3= $coursesquery->fetch_object()) {
  	
			  	$mycourses[]= $row3;
			  }

			    echo json_encode($mycourses); 

		}
		else{
			 $reponse['coursename'] = "404";
			    echo json_encode($reponse);

		}	


?>