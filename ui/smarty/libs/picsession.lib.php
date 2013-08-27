<?php

require_once("globals.php");

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
        $this->tpl->assign('pic_session_id', $this->id);
        $this->tpl->assign('key_select', '');
        $this->tpl->assign('key_up', '');
        $this->tpl->assign('key_down', '');
        $this->tpl->assign('key_left', '');
        $this->tpl->assign('key_right', '');
        $this->tpl->assign('key_menu', 'Menu');
    }
    
    function displayMenu() {
        $this->tpl->assign('key_select', 'PreviewCam');
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_menu.tpl');
    }

    function displayPrint() {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_print.tpl');
    }

    function displayPreviewCam() {
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_previewcam.tpl');
    }

    function displayAllPicsOptions() {
        $this->tpl->assign('key_select', 'Print');
        $this->tpl->assign('key_right', 'Menu');
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('ps_all_pics_options.tpl');
    }

}

?>