<?php

include('dbConnect.php');

$title = $_GET['title'];
$playlistid = $_GET['playlistid'];
$no_of_videos = $_GET['no_of_videos'];


$query = "INSERT INTO `chrome-ext` (id,title,playlistid,no_of_videos) VALUES ('','$title','$playlistid','$no_of_videos')";
if($conn->query($query)==true){
	echo "Succesful";
}else{
	echo "Error1".mysqli_error($conn);
}


?>