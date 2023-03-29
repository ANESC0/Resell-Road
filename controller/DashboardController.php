<?php

class DashboardController extends BaseController {

  public function __construct() {
    parent::__construct();
  }

// Methodes qui récupère les projet et les articles pour afficher dans les modales

  public function getContent(){

        $titleF = "Dashboard - Resell Road";
          $usePseudo = "Connexion";
          $d1='';
          $d2="";

          $dataCheck =$this->userCheckOut();

          if ($dataCheck[2]){

            // on récupère les projets

            $projectManager = new ProjectModel();
            $d1 = $projectManager->getAllProjects();

            // on récupère les articles

            $itemManager = new ItemModel();
            $d2 = $itemManager->getAllItems();

            
          
         

            $this->render('dashboard', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);

          } else {
            throw new Exception("Permission refusée");

          }

      }


      public function addProject(){

        $titleF = "Ajout de projet - Resell Road";
        $d1='';
        $d2='';

       
        $dataCheck =$this->userCheckOut();

        if ($dataCheck[2]){


           //On procede a la verification des données du formulaires  
           if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['montant']))  {


                // on construit l'objet
            $projectModel = new ProjectModel();
            $projectModel->setTitle(htmlspecialchars($_POST['titre']));
            $projectModel->setDesc(htmlspecialchars($_POST['description'])); 
            $projectModel->setGoalAmount(htmlspecialchars($_POST['montant']));

            
            // on vérifie si il y a une image
            // $uploadPath = 'assets/project/';
            // try {
            //   $imageHelper = new ImageHelper();
            //   $imageHelper->uploadFileImage($uploadPath);
            // }
            // catch (Exception $e){
            //   var_dump("$e");
            //   $errorMessage = ($e->getMessage());
            //   require("../view/errorView.php");
            // }   

         
             if(isset($_FILES['img']) && $_FILES['img']['error'] === 0) {

              // L'image est trop lourde ?
               if($_FILES['img']['size'] <= 3000000) {
      
                  $informationsImage = pathinfo($_FILES['img']['name']);
                  $extensionImage    = $informationsImage['extension'];
                  $extensionsArray   = ['png', 'gif', 'jpg', 'jpeg'];
      
                  if(in_array($extensionImage, $extensionsArray)) {
      
                      $newImageName = time().rand().rand().'.'.$extensionImage;
                      move_uploaded_file($_FILES['img']['tmp_name'], 'assets/project/'.$newImageName); 
                      $send = true;
                      $projectModel->setImg('assets/project/'.$newImageName);
      
                  } 
      
              } 
      
            }
        

          // on ajoute le projet

          if(!$projectModel->addProject()){
            throw new Exception("Impossible d'ajouter le projet");

          }
          else{
            header('location: index.php?page=dashboard');
            exit();
          }




          } else {

            $this->render('projectFormView', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);

          }
        

        } else {
          throw new Exception("Permission refusée");

        }
    


      }




  }