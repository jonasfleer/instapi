<?php
require_once("globals.php");
$id = $_GET['id'];
$type = $_GET['type'];

if ($type=="thumb") {
    $im = file_get_contents(THUMB_DIR . '/' . $id . '.jpg'); 
} else if ($type=="original") {
    $im = file_get_contents(PIC_DIR . '/' . $id . '.jpg'); 
}
header('Content-Type: image/jpeg'); 
echo $im;

?>