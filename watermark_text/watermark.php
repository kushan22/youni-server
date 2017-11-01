<?php
$path="uploads/";
 $font_path = "Roboto-Regular.ttf"; // Font file
$font_size = 25; // in pixcels
$font_size_2 = 13;
$tot_width = 31;
$water_mark_text_1 = $_GET['username'];

$water_mark_text_2 = $_GET['coursename'];

$water_mark_text_3 = $_GET['link'];

$oldimage_name = "certificate.jpg";
$new_image_name = $path.time().".jpg";

if(watermark_text($oldimage_name, $new_image_name))
$demo_image = $new_image_name;

$response = array();
//http://randomstuffonline.com/watermark_text/
$str = explode("/", $demo_image);
$response['certi_url'] = $str[1];

echo json_encode($response);

// Watermark Text
function watermark_text($oldimage_name,$new_image_name){


global $font_path, $font_size, $font_size_2,$water_mark_text_2,$water_mark_text_1,$water_mark_text_3;
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = 842;
$height = 595; 
$image = imagecreatetruecolor($width, $height);
$image_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$blue = imagecolorallocate($image, 10, 34, 43);

imagettftext($image, $font_size, 0, 235 , 263, $blue, $font_path, $water_mark_text_1);
imagettftext($image, $font_size, 0, 235 , 364, $blue, $font_path, $water_mark_text_2);
imagettftext($image, $font_size_2, 0, 530, 500, $blue, $font_path, $water_mark_text_3);

imagejpeg($image, $new_image_name, 100);
imagedestroy($image);
return true;
}
?>