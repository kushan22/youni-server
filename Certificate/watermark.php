<?php

include('init.php');
$username = $water_mark_text_1 =$_GET['username'];
$email = $_GET['email'];
$coursename = $water_mark_text_2 = $_GET['coursename'];

$path="../certificate/";
 $font_path = "Roboto-Regular.ttf"; // Font file
$font_size = 25; 
$font_size_2 = 19;
// in pixcels
$font_size_3 = 9;
$tot_width = 31;
$new_image_name =  $path.time().".jpg";

$spaces =0;


function insert_certificate($username,$email,$coursename,$link){

	$conn=new mysqli('localhost','youni2','Coldplay1','youni');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

	$query ="INSERT INTO `certificate` (id,username,email,coursename,link) VALUES ('','$username','$email','$coursename','$link')";
	if($conn->query($query)==TRUE){
		
	}
	else{
		echo "Error : ".$conn->error; 
	}

}
// Watermark Text
function watermark_text_1($oldimage_name,$new_image_name){


global $font_path, $font_size, $font_size_2,$font_size_3,$water_mark_text_2,$water_mark_text_1,$water_mark_text_3,$newstring;
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = 842;
$height = 595; 
$image = imagecreatetruecolor($width, $height);
$image_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$blue = imagecolorallocate($image, 10, 34, 43);

imagettftext($image, $font_size, 0, 230 , 260, $blue, $font_path, $water_mark_text_1);

for($i=0;$i<sizeof($newstring);$i++){
   	imagettftext($image, $font_size_2, 0, 230  , 350 + 30*$i, $blue, $font_path, $newstring[$i]);
}

imagettftext($image, $font_size_3, 0, 530, 510, $blue, $font_path, $water_mark_text_3);

imagejpeg($image, $new_image_name, 100);
imagedestroy($image);
return true;
}

function watermark_text_2($oldimage_name,$new_image_name){


global $font_path, $font_size, $font_size_2,$font_size_3,$water_mark_text_2,$water_mark_text_1,$water_mark_text_3,$newstring;
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = 842;
$height = 595; 
$image = imagecreatetruecolor($width, $height);
$image_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$blue = imagecolorallocate($image, 10, 34, 43);

imagettftext($image, $font_size, 0, 230 , 245, $blue, $font_path, $water_mark_text_1);

for($i=0;$i<sizeof($newstring);$i++){
   	imagettftext($image, $font_size_2, 0, 230  , 330 + 30*$i, $blue, $font_path, $newstring[$i]);
}

imagettftext($image, $font_size_3, 0, 530, 515, $blue, $font_path, $water_mark_text_3);

imagejpeg($image, $new_image_name, 100);
imagedestroy($image);
return true;
}

function watermark_text_3($oldimage_name,$new_image_name){


global $font_path, $font_size, $font_size_2,$font_size_3,$water_mark_text_2,$water_mark_text_1,$water_mark_text_3,$newstring;
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = 842;
$height = 595; 
$image = imagecreatetruecolor($width, $height);
$image_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$blue = imagecolorallocate($image, 10, 34, 43);

imagettftext($image, $font_size, 0, 235 , 235, $blue, $font_path, $water_mark_text_1);

for($i=0;$i<sizeof($newstring);$i++){
   	imagettftext($image, $font_size_2, 0, 235  , 320 + 30*$i, $blue, $font_path, $newstring[$i]);
}

imagettftext($image, $font_size_3, 0, 530, 520, $blue, $font_path, $water_mark_text_3);

imagejpeg($image, $new_image_name, 100);
imagedestroy($image);
return true;
}



$query1 =(" SELECT * FROM `certificate` WHERE email= '".$email."' AND coursename = '".$coursename."' " );

		  	
  $result = mysqli_query($conn, $query1);
   //$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);			
			
			$response = array();
			$temp_link = str_replace("www.youni.co.in/certificate/", "",$row['link']);
			$response['status'] = $row['status'];
			$response['certi_url'] = $temp_link;
			//echo "<img src='../certificate/".$temp_link."' />";
			echo json_encode($response);

		}
		else{

$l=0; $count=0;

for ($j=0; $j <strlen($water_mark_text_2) ; $j++) { 
	
	$pos = $water_mark_text_2{$j};
    	if($pos != ' '){
			$count++;    		
    	}
    	else{
    		$letters[$l] = $count;
    		$l++;
    		$count=0;
    	}

}


$count =0;
$parts = array();
$t=0;

for($k=0;$k<sizeof($letters);$k++){
	$count = $count + $letters[$k] + 1;
	if($count>35)
	{
		$parts[$t] = $count;
		$t++;
		$count=0;
	} 
	
}

$newstr = $water_mark_text_2;
$count=0;
for($l=0;$l<sizeof($parts);$l++){
	$count += $parts[$l];
	$newstr = substr_replace($newstr,"~", $count-1,1);
}


$newstring = explode("~", $newstr);

$link = $water_mark_text_3 = "www.youni.co.in/".str_replace("../", "", $new_image_name);

insert_certificate($username,$email,$coursename,$link);

switch(sizeof($newstring)){

	case 1: $oldimage_name = "1.jpg";
			
			if(watermark_text_1($oldimage_name, $new_image_name))
				$demo_image = $new_image_name;
	break;
	case 2:$oldimage_name = "2.jpg";
			if(watermark_text_2($oldimage_name, $new_image_name))
				$demo_image = $new_image_name;
	break;
	case 3:$oldimage_name = "3.jpg";
			if(watermark_text_3($oldimage_name, $new_image_name))
				$demo_image = $new_image_name;
	break;
}


$response = array();
//echo "<img src='".$demo_image."'/>";
$demo_image = str_replace("../", "", $demo_image);
//http://randomstuffonline.com/watermark_text/
$str = explode("/", $demo_image);
$response['certi_url'] = $str[1];

echo json_encode($response);


}
?>