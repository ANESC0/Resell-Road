<?php


class BaseController {

    protected $session;
  
    public function __construct() {
  
      $this->session = new SessionHelper();
    }
  
    public function render($templateName, $title, $d1, $d2, $userPseudo ,$isConnect, $error, $showHeader) {
      ob_start();
  
      if ($showHeader==true) {
       
        require("view/header.php");
        
      }
     
      require('view/'.$templateName.'.php');
  
      $content = ob_get_clean();
      require('view/base.php');
    }



  }