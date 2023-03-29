<?php


class BaseController {

    protected $session;
  
    public function __construct() {
  
      $this->session = new SessionHelper();
    }
  
    public function render($templateName, $title, $d1, $d2, $userPseudo ,$isConnect, $isAdmin, $error, $showHeader) {
      ob_start();
  
      if ($showHeader==true) {
       
        require("../view/header.php");
        
      }
     
      require('../view/'.$templateName.'.php');
  
      $content = ob_get_clean();
      require('../view/base.php');
    }


    public function userCheckOut(){

      $usePseudo = "Connexion";
      $useType=1;
      $isAdmin= false;
      $isConnect = false;

      
      if ($this->session->isVarExist('userSecret')) {
        $user = new UserModel();
        $user->findBySecret($this->session->getVar('userSecret'));
        if (!$user) {
          throw new Exception('Session corrompue !');
        }
        $usePseudo = $user->getPseudo();
        $useType = $user->getType();
      }

      if ($useType==2){
        $isAdmin=true;
      } 
  
      if($this->session->isVarExist('connect')){
        $isConnect = true;
  
      }

      $checkData = array ( $usePseudo, $isConnect, $isAdmin);
      return $checkData;

    }



  }