<?php

	include('dbConnect.php');

	$email = $_GET['email'];
	$playlistid = $_GET['playlistid'];
	$state= "unjoined";

	$sql = "UPDATE `mycourses` SET state='$state' WHERE user='$email' AND playlistid='$playlistid' ";
			if ($conn->query($sql) === TRUE) {
				$reponse['status'] = "200";
				echo json_encode($reponse);
			} else {
			    $reponse['status'] = "404";
			    echo json_encode($reponse);
			}


?>