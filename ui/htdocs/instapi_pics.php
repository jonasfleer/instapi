<?php

$id = $_GET['id'];
$im = file_get_contents('/home/pi/instapi_pics/' . $id . '.jpg'); 
header('Content-Type: image/jpeg'); 
echo $im;

?>