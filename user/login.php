<?php

include('dbConnect.php');
$email = $_GET['email'];
$pass = md5($_GET['pass']);

$query = "Select * FROM registered_users WHERE useremail = '$email' AND userpass = '$pass' ";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0 ){
		$response = array();
		$response['status'] = "200";
		$response['name'] = $row['username'];
		echo json_encode($response);
	}
	else{
		$response = array();
		$response['status'] = "404";
		echo json_encode($response); 
	}



?>