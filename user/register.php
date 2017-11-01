<?php

include('dbConnect.php');

$name = $_GET['name'];
$email = $_GET['email'];
$pass = md5($_GET['pass']);


 $query = "INSERT INTO `registered_users`(user_id,username,useremail,userpass,profile_image) VALUES('','$name','$email','$pass','')";
 
 if($conn->query($query)==TRUE){
		$response = array();
		$response['response'] = "Successfully Inserted";
		echo json_encode($response);
	}
	else{
		$response = array();
		$response['response'] = "Unable to Insert";
		echo json_encode($response); 
	}

?>