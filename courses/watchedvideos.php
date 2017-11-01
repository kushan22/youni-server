<?php 

	include('dbConnect.php');
	$email = $_GET['email'];
	$playlistid = $_GET['playlistid'];

	$query = "SELECT video_title FROM `watched_videos` WHERE useremail='$email' AND playlist = '$playlistid' ";

	$coursesquery= $conn->query($query);

	  
   	 $playlist_link = "https://www.youtube.com/playlist?list=".$playlistid;	
	  $query1 = "SELECT videos_number FROM `playlist_details` WHERE topic_playlist_id ='$playlist_link'";
	  $result=mysqli_query($conn,$query1);
		$row = mysqli_fetch_assoc($result);

		

	  $response = array();
	  if($coursesquery->num_rows > 0){
			  	while ($row3= $coursesquery->fetch_array()) {
			  	
			  	$mycourses[]= $row3;

			  }
			    	for($i=0;$i<sizeof($mycourses);$i++) {
		  	 		$response[$i]['video_name'] = $mycourses[$i]['video_title'];
		  	 	} 	
		  	 	$response[0]['video_no']=$row['videos_number'];	

	  }
	  else{

	  		$response[0]['video_no']=$row['videos_number'];
	  		$response[0]['video_name']="404";
	  }
  	 	echo json_encode($response);

?>