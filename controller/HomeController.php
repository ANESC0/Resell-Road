<?php

class HomeController extends BaseController {

  public function __construct() {
    parent::__construct();
  }

  public function index() {

    $titleF = "Accueil - Resell Road";
    $d1='';
    $d2="";

    $dataCheck =$this->userCheckOut();

    

    $this->render('home', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , true);
    // ob_start();
    // require("view/header.php");
    // //$header = ob_get_clean();

    // //ob_start();
    // require('view/home.php');

    // $content = ob_get_clean();
    // require('view/base.php');
  }

  public function error($error){
    $titleF = "Erreur - Resell Road";
    $d1='';
    $d2='';
   
    $dataCheck =$this->userCheckOut();

    $this->render('errorView', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , $error , false);


  }

}