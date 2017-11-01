<?php

	$conn=new mysqli('localhost','youni2','Coldplay1','youni');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

?>