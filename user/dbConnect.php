	
<?php 
 
 define('HOST','localhost');
 define('USER','youni2');
 define('PASS','Coldplay1');
 define('DB','youni');
 
 $conn = mysqli_connect(HOST,USER,PASS,DB) or die('unable to connect to db');