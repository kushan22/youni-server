<?php

include("watermark.php");
$demo_image= "";
if(isset($_POST['createmark']) and $_POST['createmark'] == "Submit")
{
$path = "uploads/";
$valid_formats = array("jpg", "bmp","jpeg");
$name = $_FILES['imgfile']['name'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats) && $_FILES['imgfile']['size'] <= 256*1024)
{
$upload_status = move_uploaded_file($_FILES['imgfile']['tmp_name'], $path.$_FILES['imgfile']['name']);
if($upload_status){
$new_name = $path.time().".jpg";
// Here you have to user functins watermark_text or watermark_image
echo $path.$_FILES['imgfile']['name']." <br>";
echo $new_name;
if(watermark_text($path.$_FILES['imgfile']['name'], $new_name))
$demo_image = $new_name;
}
}
else
$msg="File size Max 256 KB or Invalid file format.";
}
}
?>
// HTML Code
<form name="imageUpload" method="post" enctype="multipart/form-data" >
Upload Image
Image :<input type="file" name="imgfile" value="http://www.viesr.com/images/certificate.jpg" /><br />
<input type="submit" name="createmark" value="Submit" />
<?php
if(!empty($demo_image))
echo '<img src="'.$demo_image.'" />';
?>
</form>