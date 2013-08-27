<?php
error_reporting(E_ALL | E_STRICT);

require_once("globals.php");

// include the funcs script
include(INSTAPI_DIR . 'libs/funcs.lib.php');
// include the setup script
include(INSTAPI_DIR . 'libs/picsession_setup.php');

// set the current action
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'Menu';
$picSessionId = isset($_GET['pic_session_id']) ? $_GET['pic_session_id'] : genSessionId();
// syslog(LOG_INFO, "picsession id " . $picSessionId . " running.");
// create PicSession object
$picSession = new PicSession($picSessionId);

switch($_action) {
    default:
        // viewing the screen
        $picSession->{'display' . $_action}();
        break;   
}

?>
