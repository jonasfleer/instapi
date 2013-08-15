<?php
error_reporting(E_ALL | E_STRICT);

// define our application directory
define('INSTAPI_DIR', '/home/pi/instapi/ui/smarty/');
// define smarty lib directory
// define('SMARTY_DIR', '/Applications/MAMP/bin/php/php5.3.6/lib/php/Smarty/');
// define picture storage path
define('PIC_DIR', '/home/pi/instapi_pics');
define('APP_TEMP_DIR', '/tmp/instapi_www_temp');
// include the funcs script
include(INSTAPI_DIR . 'libs/funcs.lib.php');
// include the setup script
include(INSTAPI_DIR . 'libs/picsession_setup.php');

// set the current action
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'Menu';
$picSessionId = isset($_REQUEST['picsession_id']) ? $_REQUEST['picsession_id'] : genSessionId();

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
