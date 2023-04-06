<?php

  class ItemController extends BaseController{

   public function __construct() {
      parent::__construct();
    }


    public function getItem($id){
        $titleF = "Article ".$id." - Resell Road";
        $d2='';

        $dataCheck =$this->userCheckOut();
        
          
          $itemManager = new ItemModel();
          $d1 = $itemManager->getOneItem($id);

          // on récupère les commentaires
          $commentModel = new CommentModel();
          $d2 = $commentModel->getCommentsByItem($id);

          if ($d1 != false){

            // on récupère les éventuels commentaire ajouté sinon on affiche la page

            if (!empty($_POST['commentaire'])){

              // on vérifie qu'un utilisateur est bien connecté
              if($dataCheck[1]!=false){
                // on ajoute les valeurs à l'objet
              
              $commentModel->setUser($dataCheck[3]);
              $commentModel->setUserPseudo($dataCheck[0]);
              $commentModel->setDesc(htmlspecialchars($_POST['commentaire']));
              $commentModel->setItem($id);
              $commentModel->setProject($d1->project_id);

              // on ajoute le commentaire en bdd
              if (!$commentModel->addComment()){
                throw new Exception("Impossible d'ajouter le commentaire");
              } else {
                header('location: index.php?page=article&id='.$id);
              exit();
              }


              } else {
                throw new Exception("Vous devez vous connecter pour ajouter un commentaire");
              }

             

            } else {
              $this->render('item', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);

            }

           
            
          } else {
            header('location: index.php?page=home');
              exit();
    
          }

      

      


    }


    public function deleteComment($id){
      $titleF = "Article ".$id." - Resell Road";
      $d1='';
        $d2='';

        $dataCheck =$this->userCheckOut();

        // verifier que le commentaire existe
        $commentModel = new CommentModel();
        $res = $commentModel->completeComment($id);
        

        if ( $res == false ){
          throw new Exception("Imposible de récupérer le commentaire");

        }
       
       

        // verifier que l'utilisateur est le propriétaire du commentaire
        if($commentModel->getUser()==$dataCheck[3]){

          if(!$commentModel->deleteCommentById($id)){
            throw new Exception("Imposible de supprimer le commentaire");
            

          }
          header('location: index.php?page=article&id='.$commentModel->getItem());
          exit();
         
          


        } else {
          header('location: index.php?page=article&id='.$commentModel->getItem());
          exit();
        }



    }




  }