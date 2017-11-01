<?php
	// New Oncompltecourses to check user's time with the total time spent

 include('dbConnect.php');
 $email = $_GET['email'];
 $playlistid = $_GET['playlistid'];
 $playlistidurl = "https://www.youtube.com/playlist?list=".$playlistid;

  $query = "SELECT `course_time_spent` From `mycourses` WHERE user='$email' AND playlistid = '$playlistid'";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $user_time =  $row['course_time_spent'];//113

  $query1 = "SELECT `total_duration` FROM `playlist_details` WHERE topic_playlist_id = '$playlistidurl'";
  $result1 = mysqli_query($conn,$query1);
  $row1 = mysqli_fetch_assoc($result1);
  $total_time = $row1['total_duration'];//250

   if($user_time > (0.3 * $total_time)){
   	
   	$state = "completed";
 	$query = "UPDATE `mycourses` SET state='$state' WHERE user='$email' AND playlistid='$playlistid' ";
 
 	$query1 = "DELETE FROM `watched_videos` WHERE playlist = '$playlistid' AND useremail ='$email'";

 	if($conn->query($query1)==true && $conn->query($query)==true ){

 		$response['status'] = "200";
 		$response['course_state'] ="1";

 	}else{
 		$response['status'] = "404";
 	}

 	echo json_encode($response);

   }else{
   	
   	$state = "joined";

 	$query = "UPDATE `mycourses` SET state='$state' WHERE user='$email' AND playlistid='$playlistid' ";
	$query1 = "DELETE FROM `watched_videos` WHERE playlist = '$playlistid' AND useremail ='$email'"; 
 	if($conn->query($query)==true && $conn->query($query1)==true){

 		$response['status'] = "200";
 		$response['course_state'] ="0";
 	}else{
 		$response['status'] = "404";
 	}

 	echo json_encode($response);
   }
 
?>