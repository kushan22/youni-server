<?php

include('dbConnect.php');
$email = $_GET['email'];
$state = "joined";

$query = "SELECT course_name,date,playlistid FROM `mycourses` WHERE user ='$email' AND state='$state'";
$coursesquery= $conn->query($query);

  while ($row3= $coursesquery->fetch_object()) {
  	
  	$mycourses[]= $row3;

  }

  echo json_encode($mycourses); 

/*
  $course = array();
  foreach ($mycourses as $mycourses) {
  		
  	$course['course_name'] = $mycourses->course_name;
  	$course['date']	= $mycourses->date;
  	$course['playlistid'] = $mycourses->playlistid;


  }

  print_r($course);
*/
?>