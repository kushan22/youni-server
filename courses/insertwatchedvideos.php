<?php

	include('dbConnect.php');

	$email = $_GET['email'];
	$playlistid = $_GET['playlistid'];
	$video_title = $_GET['video_title'];
	$state = 1;
	$response = array();

	$query = "SELECT * FROM `watched_videos` WHERE useremail = '$email' AND playlist ='$playlistid' AND video_title='$video_title' ";
	$videoquery = $conn->query($query);
	if($videoquery->num_rows > 0){

		$response['status'] = "0";
	}else{
		$query1 = "INSERT INTO `watched_videos` (_id,playlist,video_title,state,useremail) VALUES ('','$playlistid','$video_title','$state','$email')";

			if($conn->query($query1) == true){
				$response['status'] = "200";
			}else{
				$response['status'] = "404";
			}

	}



	echo json_encode($response);

?>