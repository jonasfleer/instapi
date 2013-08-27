<?php
error_reporting(E_ALL | E_STRICT);

require_once('globals.php');
require_once('smarty/funcs.lib.php');

// possible modes:
//  * thumb, print_master
$mode = $_GET['mode'];
$geometry = empty($_GET['geometry']) ? THUMB_WIDTH : $_GET['geometry'];

if (empty($_GET['id'])) {
    die ('No image ID given.');
}
$pic_id = $_GET['id'];

$cmd = '';
if ($mode == 'thumb') {
    // identifier for usage in file paths
    $pic_path = PIC_DIR . '/' . $pic_id . '.jpg';
    $thumb_path = THUMB_DIR . '/' . computeThumbfileName($pic_id, $geometry) . '.jpg';
    $cmd = 'convert '.$pic_path.' -thumbnail '.$geometry.' '.$thumb_path;
} else if ($mode == 'print_master') {
    $cmd = 'convert -size '.(ORIG_WIDTH*2).'x'.(ORIG_HEIGHT*2).' xc:white \
      \( $pic_id . '_0.jpg' -resize '.ORIG_WIDTH.'\> \) -geometry +0+0 -composite \
      \( $pic_id . '_1.jpg' -resize '.ORIG_WIDTH.'\> \) -geometry +'.ORIG_WIDTH.'+0 -composite \
      \( $pic_id . '_2.jpg' -resize '.ORIG_WIDTH.'\> \) -geometry +0+'ORIG_HEIGHT' -composite \
      \( $pic_id . '_3.jpg' -resize '.ORIG_WIDTH.'\> \) -geometry +'.ORIG_WIDTH.'+'.ORIG_HEIGHT.' \
      -composite '. PRINT_MASTER_DIR . '/' . $pic_id . '.jpg';
} else {
    die('Invalid mode given '.$mode);
}

if (DEBUGME) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }
$out = exec($cmd, $exec_out);

echo "Executed " . $cmd . ' ---- ' . $out;

?>
