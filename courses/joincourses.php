<?php

include('dbConnect.php');
  $course_name= $_GET['course_name'];
  $course_playlist_id=$_GET['playlistid'];
  $date=$_GET['date'];
  $email=$_GET['email'];
  $state=$_GET['state'];

  
	  $query = "SELECT * FROM `mycourses` WHERE user='$email' AND playlistid='$course_playlist_id'";

		$result=mysqli_query($conn,$query);
	
		
		$reponse = array();
	   if(mysqli_num_rows($result) > 0 ){
			$sql = "UPDATE `mycourses` SET state='$state' WHERE user='$email' AND playlistid='$course_playlist_id' ";
			if ($conn->query($sql) === TRUE) {
				$reponse['status'] = "200";
				echo json_encode($reponse);
			} else {
			    $reponse['status'] = "404";
			    echo json_encode($reponse);
			}
		}
		else{

			$sql = "INSERT INTO `mycourses` (course_id,course_name,date,playlistid,user,state) VALUES ('','$course_name','$date','$course_playlist_id','$email','$state') ";
			if ($conn->query($sql) === TRUE) {
			 $reponse['status'] = "200";
			 echo json_encode($reponse);
			} else {
			    $reponse['status'] = "404";
			    echo json_encode($reponse);
			}	 
		}
//

?>