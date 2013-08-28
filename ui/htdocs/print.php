<?php
error_reporting(E_ALL | E_STRICT);

require_once('globals.php');
require_once(INSTAPI_DIR . 'libs/funcs.lib.php');

$pic_id = empty($_GET['id']) ? $_GET['pic_session_id'] : $_GET['id'];

echo printPics($pic_id);



?>