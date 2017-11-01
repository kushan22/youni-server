<?php
	
	include('dbConnect.php');
	$str = $_GET['query'];


	$query = "SELECT topic_name,topic_playlist_id FROM `playlist_details` WHERE topic_name LIKE '%".$str."%' ";
	$coursesquery= $conn->query($query);

	  while ($row3= $coursesquery->fetch_object()) {
	  	
	  	$mycourses[]= $row3;

	  }

  echo json_encode($mycourses); 


?>