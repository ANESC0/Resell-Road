<?php

  class ProjectController extends BaseController{

   public function __construct() {
      parent::__construct();
    }


    public function Projects($index){

        $titleF = "Mes ventes - Resell Road";
        $usePseudo = "Connexion";
        $isConnect = false;
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
      
      

        $projectManager = new ProjectModel();

        $d1 = $projectManager->getProjects($num);

        $this->render('sales', $titleF ,$d1 , $d2, $usePseudo , $isConnect , '' , true);


    }



    public function projectById($num){
      
      $titleF = "Road ".$num." - Resell Road";
      $usePseudo = "Connexion";
      $isConnect = false;
      
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

       // on recupere le projet pour afficher tous les articles liées 

      $projectManager = new ProjectModel();
      $d1 = $projectManager->getProject($num);

      // on recupere tous les articles

      $itemManager = new ItemModel();
      $d2 = $itemManager->getItemsByProject();

      $this->render('sales', $titleF ,$d1 , $d2, $usePseudo , $isConnect , '' , true);
    }




}