<?php 

  include('dbConnect.php');

  $email = $_GET['email'];
  $new_pass = md5($_GET['newpass']);

  $query = "UPDATE `registered_users` SET userpass='$new_pass' WHERE useremail='$email' ";
  
  $response= array();

  if($con->query($query) === TRUE){
  	$response['response'] = "200";
  	echo json_encode($response);
  }else{
  	$response['response'] = "404";
  	echo json_encode($response);
  }

?>
