<?php
error_reporting(E_ALL | E_STRICT);

require_once("globals.php");
require_once(INSTAPI_DIR . 'libs/funcs.lib.php');

set_time_limit(120);

$pic_id = empty($_GET['id']) ? $_GET['pic_session_id'] : $_GET['id'];

$masterimage_path = PRINT_MASTER_DIR . '/' . $pic_id . '.jpg';
$sys_vars = "masterimage_path=".$masterimage_path.
            " PRINT_MASTER_DIR=".PRINT_MASTER_DIR.
            " ORIG_WIDTH_TIMES_2=".(ORIG_WIDTH*2).
            " ORIG_HEIGHT_TIMES_2=".(ORIG_HEIGHT*2).
            " ORIG_WIDTH=".ORIG_WIDTH.
            " ORIG_HEIGHT=".ORIG_HEIGHT.
            " PIC_DIR=".PIC_DIR.
            " pic_id=".$pic_id;

$cmd = $sys_vars . ' nohup /bin/bash ' . INSTAPI_DIR . '/libs/print.sh >> '.PRINT_LOGPATH.' 2>&1 &';
if (DEBUGME) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }    
$out = exec($cmd, $exec_out);


?>