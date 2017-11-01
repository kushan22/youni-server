<?php

  include('dbConnect.php');
 $email = $_GET['email'];
 $playlistid = $_GET['playlistid'];
 $state = "completed";
 $query = "UPDATE `mycourses` SET state='$state' WHERE user='$email' AND playlistid='$playlistid' ";
 
 $query1 = "DELETE FROM `watched_videos` WHERE playlist = '$playlistid' AND useremail ='$email'";

 if($conn->query($query1)==true && $conn->query($query)==true ){

 		$response['status'] = "200";
 }else{
 	$response['status'] = "404";
 }

 echo json_encode($response);

?>