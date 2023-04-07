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


      public function updateProject($projectId){

              $titleF = "Modification de projet - Resell Road";
              $d1='';
              $d2='';

              $dataCheck =$this->userCheckOut();

              // verification de l admin

              if ($dataCheck[2]){

                  // on construit l'objet
                  $projectModel = new ProjectModel();
                      
                  // on récupère le projet en bdd

                  $projectDb = $projectModel->getOneProject($projectId);
                  if ($projectDb==false){
                    throw new Exception("Impossible de trouver le projet");
              
                  }
                // si le formulaire est remplie on update sinon on affiche le formulaire
                if (!empty($_POST['titre']) || !empty($_POST['description']) || !empty($_POST['montant']) || isset($_FILES['img']))  {


                
                      $projectModel->setId($projectDb->project_id);


                  
                      if(!empty($_POST['titre']) && $projectDb->project_title!= htmlspecialchars($_POST['titre'])){
                        $projectModel->setTitle(htmlspecialchars($_POST['titre']));

                      } else {
                        $projectModel->setTitle($projectDb->project_title);
                      }

                      if ( !empty($_POST['description']) && $projectDb->project_desc!= htmlspecialchars($_POST['description'])  ){
                        $projectModel->setDesc(htmlspecialchars($_POST['description']));
                      } else {
                        $projectModel->setDesc($projectDb->project_desc);
                      }

                      if ( !empty($_POST['montant']) && $projectDb->project_goalamount!= htmlspecialchars($_POST['montant'])){
                        $projectModel->setGoalAmount(htmlspecialchars($_POST['montant']));
                      } else {
                        $projectModel->setGoalAmount($projectDb->project_goalamount);
                      }


                      // verification de la nouvelle image

                      $projectModel->setImg($projectDb->project_img);

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
                                unlink($projectDb->project_img);
                                $projectModel->setImg('assets/project/'.$newImageName);
                
                            } 
                
                        } 
                
                      }


                      // on modif en base de donnée

                      if(!$projectModel->updateProject()){
                        throw new Exception("Impossible de modifier le projet");
            
                      }
                      else{
                        header('location: index.php?page=dashboard');
                        exit();
                      }
            


                    


                } else {
                  $this->render('projectUpdateView', $titleF ,$projectDb , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);



                }
                


              }

            }


            public function deleteProject($projectId){
                  $titleF = "Supression de projet - Resell Road";
                  $d1='';
                  $d2='';

                  
                  $dataCheck =$this->userCheckOut();

                  // verification de l admin

                  if ($dataCheck[2]){


                    
                      // on verifie si le projet existe
                      $projectModel = new ProjectModel();
                      $projectDb = $projectModel->getOneProject($projectId);
                      if ($projectDb!=false){

                        // on supprime les commentaires

                        $commentModel = new CommentModel();
                        $req3 = $commentModel->deleteCommentByProject($projectId);

                        // on supprime les articles
                        $itemModel = new ItemModel();
                        $req2= $itemModel->deleteItemByProject($projectId);

                        // on supprime le projet
                      
                        $req1 = $projectModel->deleteProject($projectId);

                        // on supprime la photo
                        unlink($projectDb->project_img);
                        
                        if ($req1=false){
                          throw new Exception("Impossible de supprimer le projet");

                        }
                        if ($req2=false){
                          throw new Exception("Impossible de supprimer les articles");
                        }
                        if ($req3=false){
                          throw new Exception("Impossible de supprimer les commentaires");
                        }

                        header('location: index.php?page=dashboard');
                        exit();
                          
                          
                      }
                      }
                      throw new Exception("permission refusée");

                }




          // ajout d'article
                public function addItem(){
                  $titleF = "Ajout d'article - Resell Road";
                  $d1='';
                  $d2='';

                  $dataCheck =$this->userCheckOut();

                  
                  if ($dataCheck[2]){

                    // on récupère les projet pour les afficher dans les selections

                      // on construit l'objet
                      $projectModel = new ProjectModel();
                              
                      // on récupère le projet en bdd

                      $projectDb = $projectModel->getAllProjects();
                      if ($projectDb==false){
                        throw new Exception("Impossible de récuperer les projets");
                  
                      }


                    //On procede a la verification des données du formulaires  
                    if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['purchase']) && !empty($_POST['sale']) && !empty($_POST['brand']) && (isset($_FILES['img']) && $_FILES['img']['error'] === 0))  {


                        // on construit l'objet
                    $itemModel = new ItemModel();
                    $itemModel->setTitle(htmlspecialchars($_POST['titre']));
                    $itemModel->setDesc(htmlspecialchars($_POST['description'])); 
                    $itemModel->setPurchasePrice(htmlspecialchars($_POST['purchase']));
                    $itemModel->setSalePrice(htmlspecialchars($_POST['sale']));
                    $itemModel->setBrand(htmlspecialchars($_POST['brand']));
                    $itemModel->setProject(htmlspecialchars($_POST['project']));
                
                  
                      

                      // L'image est trop lourde ?
                        if($_FILES['img']['size'] <= 3000000) {
              
                          $informationsImage = pathinfo($_FILES['img']['name']);
                          $extensionImage    = $informationsImage['extension'];
                          $extensionsArray   = ['png', 'gif', 'jpg', 'jpeg'];
              
                          if(in_array($extensionImage, $extensionsArray)) {
              
                              $newImageName = time().rand().rand().'.'.$extensionImage;
                              move_uploaded_file($_FILES['img']['tmp_name'], 'assets/item/'.$newImageName); 
                              $send = true;
                              $itemModel->setPicture('assets/item/'.$newImageName);
              
                          } 
              
                      } 
              
                    
                

                  // on ajoute le projet

                  if(!$itemModel->addItem()){
                    throw new Exception("Impossible d'ajouter l'article");

                  }
                  else{

                    // il faut mettre a jour le projet sur le nombre d'article et la somme courante
                    $projectModel->completeProjectById(htmlspecialchars($_POST['project']));
                    if(!$projectModel->updateProject2(htmlspecialchars($_POST['purchase']),htmlspecialchars($_POST['sale']))){
                      throw new Exception("Impossible de mettre à jour le projet");

                    }
                  


                    header('location: index.php?page=dashboard');
                    exit();
                  }




                  } else {

                    $this->render('itemFormView', $titleF ,$projectDb  , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);

                  }
                
                }

                }



          // affiche une selection d'item a modifier pour le projet

                public function selectItem($idProject){
                  $titleF = "Selection d'article - Resell Road";
                  $d1='';
                  $d2='';

                  $dataCheck =$this->userCheckOut();

                  
                  if ($dataCheck[2]){

                    // récuperation projet + item
                    $projectModel = new ProjectModel();
                    
                    if($projectModel->getOneProject($idProject)==false){
                      throw new Exception("Impossible de récupérer les projets");
                      
                    } 
                    $d1 = $projectModel->getOneProject($idProject);

                    $itemModel = new ItemModel();
                    if ($itemModel->getItemsByProject($idProject)==false){
                      throw new Exception("Impossible de récupérer des articles, Le projet n'en contient aucun");
                      $d2 = $itemModel->getItemsByProject($idProject);
                    } 
                    $d2 = $itemModel->getItemsByProject($idProject);


                    $this->render('itemSelectView', $titleF ,$d1  , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);
                  }

                }


          // modification de l'item

                public function updateItem($idItem){
                  $titleF = "Modification d'article - Resell Road";
                  $d2='';
                  $dataCheck =$this->userCheckOut();

                  
                  if ($dataCheck[2]){

                    // on recupere les donnée de l'article
                    $itemModel = new ItemModel();
                    if($itemModel->getOneItem($idItem)==false){
                      throw new Exception("Impossible de  récupérer les données l'article");
                    
                    } 

                    $itemDb = $itemModel->getOneItem($idItem);

                    // on récupere les projet
                    $projectModel = new ProjectModel();
                    if($projectModel->getAllProjects()==false){
                      throw new Exception("Impossible de  récupérer les données du projet"); 
                    }
                    $d2 = $projectModel->getAllProjects();


                    // on vérifie que le formulaire est complété
                    if (!empty($_POST['titre']) || !empty($_POST['description']) || !empty($_POST['purchase']) || !empty($_POST['sale']) || !empty($_POST['brand']) || !empty($_POST['project']) || isset($_FILES['img']))  {
                        
                      $itemModel->setId($itemDb->item_id);

                      if(!empty($_POST['titre']) && $itemDb->item_title!= htmlspecialchars($_POST['titre'])){
                        $itemModel->setTitle(htmlspecialchars($_POST['titre']));
                      } else {
                        $itemModel->setTitle($itemDb->item_title);
                      }
                      
                      if(!empty($_POST['description']) && $itemDb->item_desc!= htmlspecialchars($_POST['description'])){
                        $itemModel->setDesc(htmlspecialchars($_POST['description']));
                      } else {
                        $itemModel->setDesc($itemDb->item_desc);
                      }

                      if(!empty($_POST['purchase']) && $itemDb->item_purchase!= htmlspecialchars($_POST['puchase'])){
                        $itemModel->setPurchasePrice(htmlspecialchars($_POST['purchase']));
                      } else {
                        $itemModel->setPurchasePrice($itemDb->item_title);
                      }

                      if(!empty($_POST['sale']) && $itemDb->item_sale!= htmlspecialchars($_POST['sale'])){
                        $itemModel->setSalePrice(htmlspecialchars($_POST['sale']));
                      } else {
                        $itemModel->setSalePrice($itemDb->item_title);
                      }

                      if(!empty($_POST['brand']) && $itemDb->item_brand!= htmlspecialchars($_POST['brand'])){
                        $itemModel->setBrand(htmlspecialchars($_POST['brand']));
                      } else {
                        $itemModel->setBrand($itemDb->item_brand);
                      }

                      if(!empty($_POST['project']) && $itemDb->project_id!= htmlspecialchars($_POST['project'])){
                        $itemModel->setProject(htmlspecialchars($_POST['project']));
                      } else {
                        $itemModel->setProject($itemDb->project_id);
                      }

                      // verification de la nouvelle image

                      $itemModel->setPicture($itemDb->item_img);

                      if(isset($_FILES['img']) && $_FILES['img']['error'] === 0) {

                        // L'image est trop lourde ?
                        if($_FILES['img']['size'] <= 3000000) {
                
                            $informationsImage = pathinfo($_FILES['img']['name']);
                            $extensionImage    = $informationsImage['extension'];
                            $extensionsArray   = ['png', 'gif', 'jpg', 'jpeg'];
                
                            if(in_array($extensionImage, $extensionsArray)) {
                
                                $newImageName = time().rand().rand().'.'.$extensionImage;
                                move_uploaded_file($_FILES['img']['tmp_name'], 'assets/item/'.$newImageName); 
                                $send = true;
                                // supprimer l'ancienne image
                                unlink($itemDb->item_img);
                                $itemModel->setPicture('assets/item/'.$newImageName);
                
                            } 
                
                        } 
                
                      }


                        // on modif en base de donnée

                        if(!$itemModel->updateItem()){
                          throw new Exception("Impossible de modifier l'article");
              
                        }
                        else{
                          header('location: index.php?page=dashboard');
                          exit();
                        }
          

                    } else {
                      $this->render('itemUpdateView', $titleF ,$itemDb  , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);


                    }


                    


                  }


                }


                // supprime l' article

                public function deleteItem($id){
                  $titleF = "Supression d'article - Resell Road";
                  $d1='';
                  $d2='';

                  
                  $dataCheck =$this->userCheckOut();

                  // verification de l admin

                  if ($dataCheck[2]){


                    
                      // on verifie si le projet existe
                      $itemModel = new ItemModel();
                      $itemDb = $itemModel->getOneItem($id);
                      if ($itemDb!=false){

                        // on supprime les commentaires

                        $commentModel = new CommentModel();
                        $req3 = $commentModel->deleteCommentByItem($itemDb->item_id);

                        // on supprime l' article
                        $req2= $itemModel->deleteItemById($itemDb->item_id);

                    
                        // on supprime la photo
                        unlink($itemDb->item_img);

                        // décrémenter le projet

                        $projectModel = new ProjectModel();
                        if(!$projectModel->completeProjectById($itemDb->project_id)){
                          throw new Exception("Impossible de mettre à jour le projet");

                        }
                        if(!$projectModel->updateProject3($itemDb->item_purchase, $itemDb->item_sale)){
                          throw new Exception("Impossible de mettre à jour le projet");

                        }


                       
                       
                        if ($req2==false){
                          throw new Exception("Impossible de supprimer l'article");
                        }
                        if ($req3==false){
                          throw new Exception("Impossible de supprimer les commentaires");
                        }

                        header('location: index.php?page=dashboard');
                        exit();
                          
                          
                          
                      } else {
                        throw new Exception("Impossible de récuperer l'article");

                      }

                      
                      }

                      throw new Exception("Permission refusée");



                }



      }