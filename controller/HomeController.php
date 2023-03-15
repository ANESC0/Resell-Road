<?php

class HomeController extends BaseController {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    $titleF = "Accueil";
    $usePseudo = "Connexion";
    $isConnect = false;
    $d1='';
    $d2="";

    if ($this->session->isVarExist('userSecret')) {
      $user = new UserModel();
      $user->findBySecret($this->session->getVar('userSecret'));
      if (!$user) {
        throw new Exception('Session corrompue !');
      }
      $usePseudo = $user->getPseudo();
    }

    if($this->session->isVarExist('connect')){
      $isConnect = true;

    }

    $this->render('home', $titleF , $d1 , $d2, $usePseudo , $isConnect , '', true);
    // ob_start();
    // require("view/header.php");
    // //$header = ob_get_clean();

    // //ob_start();
    // require('view/home.php');

    // $content = ob_get_clean();
    // require('view/base.php');
  }

  public function error($error){
    $titleF = "Accueil";
    $usePseudo = "Connexion";
    $isConnect = false;
    $d1='';
    $d2='';
   

    if ($this->session->isVarExist('userSecret')) {
      $user = new UserModel();
      $user->findBySecret($this->session->getVar('userSecret'));
      if (!$user) {
        throw new Exception('Session corrompue !');
      }
      $usePseudo = $user->getPseudo();
    }

    if($this->session->isVarExist('connect')){
      $isConnect = true;

    }

    $this->render('errorView', $titleF , $d1 , $d2, $usePseudo , $isConnect , $error, false);


  }

}