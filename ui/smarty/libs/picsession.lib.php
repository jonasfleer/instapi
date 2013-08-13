<?php


class PicSession {

    // smarty template object
    var $tpl = null;
    // error messages
    var $error = null;

    var $id = null;


    /**
    * class constructor
    */
    function __construct($picSessionId) {

        $this->id = $picSessionId;
        // instantiate the template object
        $this->tpl = new PicSession_Smarty;

    }
    
    function displayMenu() {
        $this->tpl->assign('key_select', 'PreviewCam');
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_menu.tpl');
    }


    function displayPreviewCam() {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_previewcam.tpl');
    }

    function displayCountdown($picIndex) {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_countdown.tpl');
    }

    function displayPicAndProceed($showPicIndex, $showPicIndex) {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_pic_and_proceed.tpl');
    }

    function displayAllPics() {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_all_pics.tpl');
    }

    function displayAllPicsOptions() {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_all_pics_options.tpl');
    }

    function displayThankYouAndByeBye() {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_thank_you_and_bye_bye.tpl');
    }


}

?>