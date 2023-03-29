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

          if ($d1 != false){
            $this->render('item', $titleF ,$d1 , $d2, $dataCheck[0] , $dataCheck[1] , $dataCheck[2] , '' , false);
            
          } else {
            header('location: index.php?page=home');
              exit();
    
          }

      

      


    }




  }