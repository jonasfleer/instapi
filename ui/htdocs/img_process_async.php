<?php
error_reporting(E_ALL | E_STRICT);

require_once('globals.php');

// possible modes:
//  * thumb, print_master
$mode = $_GET['mode'];
$geometry = empty($_GET['geometry']) ? '80' : $_GET['geometry'];

if (empty($_GET['id'])) {
    die ('No image ID given.');
}
$pic_id = $_GET['id'];

$cmd = '';
if ($mode == 'thumb') {
    // identifier for usage in file paths
    $geometry_identifier = preg_replace('/[^A-Za-z0-9]/', '', $geometry);
    $pic_path = PIC_DIR . '/' . $pic_id . '.jpg';
    $thumb_path = THUMB_DIR . '/' . $pic_id . '_' . $geometry_identifier . '.jpg';
    $cmd = 'convert '.$pic_path.' -thumbnail '.$geometry.' '.$thumb_path;
} else if ($mode == 'print_master') {
   convert -size 3840x2160 xc:white \
      \( $pic_id . '_0.jpg' -resize 1920\> \) -geometry +0+0 -composite \
      \( $pic_id . '_1.jpg' -resize 1920\> \) -geometry +1920+0 -composite \
      \( $pic_id . '_2.jpg' -resize 1920\> \) -geometry +0+1080 -composite \
      \( $pic_id . '_3.jpg' -resize 1920\> \) -geometry +1920+1080 -composite \
   /tmp/out.jpg
    $cmd = 'convert '.$pic_path.' -thumbnail '.$geometry.' '.$thumb_path;
} else {
    die('Invalid mode given '.$mode);
}



if ($debug) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }
$out = exec($cmd, $exec_out);





?>
