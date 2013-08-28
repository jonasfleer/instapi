<?php
error_reporting(E_ALL | E_STRICT);

require_once("globals.php");

// include the funcs script
include(INSTAPI_DIR . 'libs/funcs.lib.php');
// include the setup script
include(INSTAPI_DIR . 'libs/picsession_setup.php');

// set the current action
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'Menu';
$picSessionId = '';

switch($_action) {
    case 'Menu':
        // Always generate a new session ID
        $picSessionId = genSessionId();
        break;
    default:
        $picSessionId = isset($_GET['pic_session_id']) ? $_GET['pic_session_id'] : die('No session ID given');
        break;   
}

$picSession = new PicSession($picSessionId);
$picSession->{'display' . $_action}();

?>
