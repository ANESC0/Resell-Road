<?php

    class ItemModel extends DbManager {

    // Attributs
    private $_id=-1;
    private $_title;
    private $_desc;
    private $_picture;
    private $_purchasePrice;
    private $_salePrice;
    private $_brand;
    private $_project;
    private $_date;


      // Constructeur
      public function __construct() {
        parent::__construct();
       
    }

      // guetter

      public function getId(){
        return $this->_id;
        }
        
        public function getTitle(){
            return $this->_title;
        }


        public function getDesc(){
            return $this->_desc;
        }

        public function getPicture(){
            return $this->_picture;
        }

        public function getPurchasePrice(){
            return $this->_purchasePrice;
        }
        public function getSalePrice(){
            return $this->_salePrice;
        }


        public function getBrand(){
            return $this->_brand;
        }

        public function getProject(){
            return $this->_project;
        }

        public function getDate(){
            return $this->_date ;
        }



    // setter

        public function setId($var){
            $this->_id = $var;
        }

        public function setTitle($var){
            $this->_title = $var;
        }

        public function setDesc($var){
            $this->_desc = $var;
        }
        public function setPicture($var){
            $this->_picture = $var;
        }
        public function setPurchasePrice($var){
            $this->_purchasePrice = $var;
        }
        public function setSalePrice($var){
            $this->_salePrice = $var;
        }
        public function setBrand($var){
            $this->_brand = $var;
        }

        public function setProject($var){
            $this->_project = $var;
        }

        public function setDate($var){
            $this->_date = $var;
        }


  

        // Methodes

        // obtenir tous les articles
        
        public function getAllItems(){

            $req = $this->bdd->prepare('SELECT * FROM item');
            $result= $req->rowCount();
        
       
                if ($result==0) {
                    return false;
                } else {
                            
                    return $req;

                }



        }


        // obtenir les articles par projets

        public function getItemsByProject($project){

            $req = $this->bdd->prepare('SELECT * FROM item WHERE project_id = ?');
            $req->execute([$project]);
            $result= $req->rowCount();
        
        
            if ($result==0) {
                return false;
            } else {
                        
                return $req;

                }



       }
       
       // obtenir un article par index

       public function getOneItem($id){
        $req = $this->bdd->query('SELECT * FROM item WHERE item_id = '.$id.' LIMIT 1');
        $result= $req->rowCount();
        
       
        if ($result==0) {
            return false;
        }
        else {

        $result = $req->fetch(PDO::FETCH_OBJ);
            
        return $result;

        }

       }


       // ajouter un article en bdd

       public function addItem(){
         // on ajoute l'item
         $req = $this->bdd->prepare('INSERT INTO item(item_title, item_desc, item_sale, item_purchase, item_img, item_brand, project_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
         return $req->execute([$this->_title, $this->_desc, $this->_salePrice, $this->_purchasePrice, $this->_picture, $this->_brand, $this->_project]);
 


       }


       // modifier un article 

       public function updateItem(){
        
        // on ajoute l'article

        $req = $this->bdd->prepare('UPDATE item SET item_title= ?, item_desc= ?, item_purchase= ?, item_sale= ?, item_brand= ?, project_id= ?, item_img= ? WHERE item_id = ?');
        return $req->execute(array($this->_title, $this->_desc, $this->_purchasePrice, $this->_salePrice ,$this->_brand , $this->_project ,$this->_picture, $this->_id));


       }


       // supprimer tous les articles qui ont le meme id de projet

       public function deleteItemByProject($id){

        $req = $this->bdd->query('DELETE FROM item WHERE project_id = '.$id.'');
        return $req;


       }

       // supprimer l'article par son id

       public function deleteItemById($id){
        $req = $this->bdd->query('DELETE FROM item WHERE item_id = '.$id.'');
        return $req;


       }

}

    