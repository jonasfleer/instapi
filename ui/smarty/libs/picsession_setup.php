<?php

require(INSTAPI_DIR . 'libs/picsession.lib.php');
require('smarty3/Smarty.class.php');

// smarty configuration
class PicSession_Smarty extends Smarty {
    function __construct() {
      parent::__construct();
      $this->setTemplateDir(INSTAPI_DIR . 'templates');
      $this->setCompileDir(INSTAPI_DIR . 'templates_c');
      $this->setConfigDir(INSTAPI_DIR . 'configs');
      $this->setCacheDir(INSTAPI_DIR . 'cache');
      if (!is_dir(APP_TEMP_DIR)) {
          if(!mkdir(APP_TEMP_DIR)) { 
            error_log("can't create temp path at: " . APP_TEMP_DIR); 
          }
      }
    }
}
      
?>