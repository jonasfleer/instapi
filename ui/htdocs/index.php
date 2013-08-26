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
//    case 'PreviewCam':
//        $picSession->displayPreviewCam();
//        break;
    case 'Countdown':
        $picSession->displayCountdown($_POST['picIndex']);
        break;
    case 'PicAndProceed':
        if ($_POST['showPicIndex'] < 3) {
            $picSession->displayPicAndProceed($_POST['showPicIndex'], $_POST['showPicIndex'] + 1);
        } else {
            $picSession->displayPicAndProceed($_POST['showPicIndex'], null);
        }
        break;
//    case 'AllPics':
//        $picSession->displayAllPics();
//        break;
//    case 'AllPicsOptions':
//        $picSession->displayAllPicsOptions();
//        break;
//    case 'ThankYouAndByeBye':
//        $picSession->displayThankYouAndByeBye();
//        break;
//    case 'Menu':
    default:
        // viewing the screen
        $picSession->{'display' . $_action}();

        break;   
}

?>
