<?php 

 include('dbConnect.php');

 $time_spent = $_GET['time_spent'];
 $email = $_GET['email'];
 $playlistid = $_GET['playlistid'];


 $query = "SELECT course_time_spent FROM mycourses WHERE user ='$email' AND playlistid = '$playlistid' ";

	$result = mysqli_query($conn,$query);
 	$row = mysqli_fetch_assoc($result);
		
		$response = array();
	   if(mysqli_num_rows($result) > 0 ){
			
			$course_time_spent = $row['course_time_spent'];
			$course_time_spent = $course_time_spent + $time_spent;

			$query1 = "UPDATE `mycourses` SET course_time_spent = '$course_time_spent' WHERE user='$email' AND playlistid = '$playlistid'";
			if($conn->query($query1) == true){
				$response['status'] = "200";
				echo json_encode($response);
			}else{
				$response['status'] = "404";
				echo json_encode($response);
			}	
					
		}
		else{

			$response['status'] = "0";
			echo json_encode($response);    
		}

?>