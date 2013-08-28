<?php
error_reporting(E_ALL | E_STRICT);

require_once('globals.php');
require_once(INSTAPI_DIR . 'libs/funcs.lib.php');

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
    // deprecated
} else {
    die('Invalid mode given '.$mode);
}

$pic_lockfile = fopen( LOCKFILE_DIR . '/' . $pic_id . '.lock', "w");

if (flock($pic_lockfile, LOCK_EX)) {
    if (DEBUGME) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }
    $out = exec($cmd, $exec_out);

    flock($pic_lockfile, LOCK_UN);
    fclose($pic_lockfile);
}

echo "Executed " . $cmd . ' ---- ' . $out;

?>
