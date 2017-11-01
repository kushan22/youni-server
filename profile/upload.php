<?php

 if($_SERVER['REQUEST_METHOD']=='GET'){
 
 $name = $_GET['name'];
 $email = $_GET['email'];

 require_once('dbConnect.php');
 
 $sql ="SELECT user_id FROM registered_users WHERE useremail= '$email'";
 
 $res = mysqli_query($con,$sql);
 
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['user_id'];
 }
 
 $sql = "UPDATE registered_users SET username = '$name' WHERE useremail= '$email'";
 
 $response= array();
 if(mysqli_query($con,$sql)){
 $response['response'] = "200";
 echo json_encode($response);
 }
 
 mysqli_close($con);
 }else{
 $response['response'] = "404";
 echo json_encode($response);
}
