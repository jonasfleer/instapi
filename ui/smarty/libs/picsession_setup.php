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
      if (!is_dir(TEMP_DIR)) {
          if(!mkdir(TEMP_DIR)) { 
            error_log("can't create temp path at: " . TEMP_DIR); 
          }
      }
      if (!is_dir(THUMB_DIR)) {
          if(!mkdir(THUMB_DIR)) { 
            error_log("can't create temp path at: " . THUMB_DIR); 
          }
      }
      if (!is_dir(PRINT_MASTER_DIR)) {
          if(!mkdir(PRINT_MASTER_DIR)) { 
            error_log("can't create temp path at: " . PRINT_MASTER_DIR); 
          }
      }
    }
}
      
?>
