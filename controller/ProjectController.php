<?php

  class ProjectController extends BaseController{

   public function __construct() {
      parent::__construct();
    }


    public function projects($index){

        $titleF = "Mes ventes - Resell Road";
        $d2='';

        $dataCheck =$this->userCheckOut();

        $projectManager = new ProjectModel();

        $d1 = $projectManager->getProjects($index);
         if ($d1!=false){
          
          $this->render('sales', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , true);

         } else {
          header('location: index.php?page=home');
          exit();
 
        
         }
      

    }



    public function projectById($num){
      
        $titleF = "Road ".$num." - Resell Road";
        $d1='';
        $d2='';
        
        $dataCheck =$this->userCheckOut();

        // on recupere le projet pour afficher tous les articles liées 

        $projectManager = new ProjectModel();
        $d1 = $projectManager->getOneProject($num);
        if ($d1 != false){
          $itemManager = new ItemModel();
          $d2 = $itemManager->getItemsByProject($num);
          
          $this->render('project', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);
          
        } else {
          header('location: index.php?page=sales');
            exit();

        }

        // on recupere tous les articles

    
    }




}