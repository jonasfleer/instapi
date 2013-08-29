<?php

define('SMARTY_DIR', '/usr/share/php/smarty3/');
define('INSTAPI_DIR', '/home/pi/instapi/ui/smarty/');
define('PIC_DIR', '/home/pi/instapi_pics');
define('TEMP_DIR', '/tmp/instapi_www_temp');
define('THUMB_DIR', TEMP_DIR . '/thumbs');
define('PRINT_MASTER_DIR', TEMP_DIR . '/print_master');
define('DEBUGME', true);
define('SCREEN_WIDTH', 320);
define('SCREEN_HEIGHT', 240);
define('THUMB_WIDTH', 160);
define('THUMB_HEIGHT', 106);
//define('ORIG_HEIGHT', 1080);
//define('ORIG_WIDTH', 1620);
define('ORIG_HEIGHT', 540);
define('ORIG_WIDTH', 810);
define('LOCKFILE_DIR', '/run/lock');
define('RASPISTILL_LOCKFILEPATH', '/run/lock/raspistill.lock');
define('COUNTDOWN_INITIAL', 5);
define('COUNTDOWN_FOLLOWING', 2);
define('PRINT_LOGPATH', '/var/log/instapi_print.log');

?>
