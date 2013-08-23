
<?php
error_reporting(E_ALL | E_STRICT);

require_once('globals.php');

if (empty($_GET['id'])) {
    die ('No image ID given.');
}
$pic_id = $_GET['id'];
$pic_path = PRINT_MASTER_DIR . '/' . $pic_id . '.jpg';

// -o landscape

$options = '-d cp900 -n 1 -s -t "'.$pic_id.'" -o media=Custom.15x10cm -o scaling=100 --';
$cmd = 'lp '.$options.' '.$pic_path;

if ($debug) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }
$out = exec($cmd, $exec_out);

?>