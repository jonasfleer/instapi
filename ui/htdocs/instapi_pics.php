<?php
require_once("globals.php");
$id = $_GET['id'];
$type = $_GET['type'];
$geometry = empty($_GET['geometry']) ? '130' : $_GET['geometry'];

if ($type=="thumb") {
    $im = file_get_contents(THUMB_DIR . '/' . computeThumbfileName($id, $geometry) . '.jpg'); 
} else if ($type=="original") {
    $im = file_get_contents(PIC_DIR . '/' . $id . '.jpg'); 
}
header('Content-Type: image/jpeg');
echo $im;

?>